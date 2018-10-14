<?php

namespace OtherCode\Marvel;


/**
 * Class Entity
 * @package OtherCode\Marvel
 */
class Entity implements \ArrayAccess
{

    /**
     * Model constructor.
     * @param object|array $source
     */
    public function __construct($source = null)
    {
        if (is_object($source) || is_array($source) && !empty($source)) {
            $this->hydrate($source);
        }
    }

    /**
     * Populate the object recursively
     * @param array|object $source
     * @return $this
     */
    public function hydrate($source)
    {
        /**
         * foreach element of the "source" try to find programmatically
         * the correct data model base in the property type and name.
         */
        foreach ($source as $key => $value) {
            $this->set($key, $value);
        }
        return $this;
    }

    /**
     * Set the given value into the entity
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set($key, $value)
    {
        $allowed = array_keys(get_class_vars(get_class($this)));
        if (empty($allowed) || !empty($allowed) && in_array($key, $allowed)) {
            if (method_exists($this, 'set' . ucfirst($key))) {
                call_user_func_array([$this, 'set' . ucfirst($key)], [$value]);
            } else {
                $this->{$key} = self::entitize($key, $value);
            }
        }
        return $this;
    }

    /**
     * Set the given value into the entity (magic)
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * Get the requested value from the entity
     * @param string $key
     * @return null|mixed
     */
    public function get($key)
    {
        $allowed = array_keys(get_class_vars(get_class($this)));
        if (empty($allowed) || !empty($allowed) && in_array($key, $allowed)) {
            if (method_exists($this, 'get' . ucfirst($key))) {
                return call_user_func_array([$this, 'get' . ucfirst($key)], [$key]);
            }
            return $this->{$key};
        }
        return null;
    }

    /**
     * Get the requested value from the entity (magic)
     * @param string $key
     * @return null|mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Entitize the given value into \OtherCode\Marvel\Entity
     * @param string $key
     * @param mixed $value
     * @return array|Entity
     */
    public static function entitize($key, $value)
    {
        switch (gettype($value)) {
            case 'object':

                $entity = '\OtherCode\Marvel\Entities\\' . ucfirst($key);
                return class_exists($entity, true)
                    ? new $entity($value)
                    : new \OtherCode\Marvel\Entity($value);
            case 'array':

                $array = [];
                foreach ($value as $index => $item) {
                    $entity = self::entitize($key, $item);
                    isset($tmp->id)
                        ? $array[$entity->id] = $entity
                        : $array[$index] = $entity;

                }

                return $array;
            default:

                return $value;
        }
    }

    /**
     * Return all the filled properties/arrays and \OtherCode\Marvel\Entity
     * objects in array format
     * @param mixed $value
     * @return array
     */
    public function toArray($value = null)
    {
        if (!isset($value)) {
            $value = $this;
        }

        $array = [];
        foreach ($value as $key => $item) {
            switch (gettype($item)) {
                case 'object':
                case 'array':
                    $buffer = $this->toArray($item);
                    if (!empty($buffer)) {
                        $array[$key] = $buffer;
                    }
                    break;
                default:
                    if (isset($item)) {
                        $array[$key] = $item;
                    }
            }
        }
        return $array;
    }

    /**
     * Return the object in json format
     * @param boolean $pretty
     * @return string
     */
    public function toJSON($pretty = false)
    {
        return json_encode($this->toArray(), $pretty ? JSON_PRETTY_PRINT : null);
    }

    /**
     * Set an offset
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * Check if the given offset exists
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    /**
     * Unset an offset
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->{$offset});
    }

    /**
     * Return the requested offset
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->{$offset})
            ? $this->get($offset)
            : null;
    }

}