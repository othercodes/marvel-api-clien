<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class EntityList
 * @property int $available
 * @property int $returned
 * @property string collectionURI
 * @property string $type
 * @property Entity[] $items
 * @package OtherCode\Marvel\Entities
 */
class EntityList extends Entity implements \ArrayAccess
{

    /**
     * The number of total available stories in this list. Will
     * always be greater than or equal to the "returned" value.
     * @var int
     */
    protected $available;

    /**
     * The number of stories returned in this collection (up to 20).
     * @var int
     */
    protected $returned;

    /**
     * The path to the full list of stories in this collection.
     * @var string
     */
    protected $collectionURI;

    /**
     * The list type
     * @var string
     */
    protected $type = '\OtherCode\Marvel\Entity';

    /**
     * The list of returned stories in this collection.
     * @var Entity[]
     */
    protected $items;

    /**
     * Set the data type
     * @param $type
     */
    public function setType($type)
    {
        $this->type = trim($type);
    }

    /**
     * Set the internal items
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = Entity::entitize($this->type, $items);
    }

    /**
     * Set an offset
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * Check if the given offset exists
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * Unset an offset
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * Return the requested offset
     * @param mixed $offset
     * @return Entity
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

}