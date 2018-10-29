<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Data
 * @package OtherCode\Marvel\Entities
 */
class Data extends Entity implements \ArrayAccess
{
    /**
     * The requested offset (skipped results) of the call
     * @var int
     */
    public $offset = 0;

    /**
     * The total number of results returned by this call
     * @var int
     */
    public $limit = 0;

    /**
     * The total number of resources available given the current filter set
     * @var int
     */
    public $total = 0;

    /**
     * The total number of results returned by this call
     * @var int
     */
    public $count = 0;

    /**
     * The internal data type
     * @var string
     */
    public $type = '\OtherCode\Marvel\Entity';

    /**
     * The list of entities returned by the call
     * @var Entity[]
     */
    public $results = [];

    /**
     * Set the data type
     * @param $type
     */
    public function setType($type)
    {
        $this->type = trim($type);
    }

    /**
     * Set the result type
     * @param $results
     */
    public function setResults($results)
    {
        $this->results = Entity::entitize($this->type, $results);
    }

    /**
     * Run a filter over each of the items.
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback)
    {
        $filter = array_filter($this->results, $callback);

        return new static([
            'offset' => $this->offset,
            'limit' => $this->limit,
            'total' => $this->offset,
            'count' => count($filter),
            'type' => $this->type,
            'results' => $filter,
        ]);
    }

    /**
     * Slice the underlying collection array.
     * @param  int $offset
     * @param  int $length
     * @return static
     */
    public function slice($offset, $length = null)
    {
        $slice = array_slice($this->results, $offset, $length, true);

        return new static([
            'offset' => $this->offset,
            'limit' => $this->limit,
            'total' => $this->offset,
            'count' => count($slice),
            'type' => $this->type,
            'results' => $slice,
        ]);
    }

    /**
     * Take the first or last $limit items.
     * @param  int $limit
     * @return static
     */
    public function take($limit)
    {
        if ($limit < 0) {
            return $this->slice($limit, abs($limit));
        }
        return $this->slice(0, $limit);
    }

    /**
     * Set an offset
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->results[] = $value;
        } else {
            $this->results[$offset] = $value;
        }

        $this->count = count($this->results);
    }

    /**
     * Check if the given offset exists
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->results);
    }

    /**
     * Unset an offset
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->results[$offset]);
        $this->total = count($this->results);
    }

    /**
     * Return the requested offset
     * @param mixed $offset
     * @return Entity
     */
    public function offsetGet($offset)
    {
        return $this->results[$offset];
    }
}