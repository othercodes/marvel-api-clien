<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Data
 * @package OtherCode\Marvel\Entities
 */
class Data extends Entity
{

    /**
     * The requested offset (skipped results) of the call
     * @var int
     */
    public $offset;

    /**
     * The total number of results returned by this call
     * @var int
     */
    public $limit;

    /**
     * The total number of results returned by this call
     * @var int
     */
    public $total;

    /**
     * The total number of results returned by this call
     * @var int
     */
    public $count;

    /**
     * The list of entities returned by the call
     * @var Entity[]
     */
    public $results;
}