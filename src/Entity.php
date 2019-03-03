<?php

namespace OtherCode\Marvel;


use Doctrine\Common\Inflector\Inflector;

/**
 * Class Entity
 * @package OtherCode\Marvel
 */
class Entity
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
     * @param string $type
     * @param mixed $value
     * @return array|Entity
     */
    public static function entitize($type, $value)
    {
        switch (gettype($value)) {
            case 'object':

                $entity = strpos($type, '\\') === 0 ? $type
                    : '\OtherCode\Marvel\Entities\\' . ucfirst(Inflector::singularize($type));
                return class_exists($entity, true)
                    ? new $entity($value)
                    : new \OtherCode\Marvel\Entity($value);
            case 'array':

                $array = [];
                foreach ($value as $index => $item) {
                    $array[$index] = self::entitize($type, $item);
                }

                return $array;
            default:

                return $value;
        }
    }

    /**
     * Transform the given structure into array
     * @param mixed $value
     * @return array
     */
    public static function arrayize($value)
    {
        $array = [];
        foreach ($value as $key => $item) {
            switch (gettype($item)) {
                case 'object':
                case 'array':
                    $buffer = self::arrayize($item);
                    if (!empty($buffer)) {
                        $array[trim($key)] = $buffer;
                    }
                    break;
                default:
                    if (isset($item)) {
                        $array[trim($key)] = $item;
                    }
            }
        }
        return $array;
    }

    /**
     * Return all the filled properties/arrays and \OtherCode\Marvel\Entity
     * objects in array format
     * @return array
     */
    public function toArray()
    {
        return self::arrayize($this);
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

}