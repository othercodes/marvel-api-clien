<?php


namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Summary
 * @package OtherCode\Marvel\Entities
 */
class Summary extends Entity
{
    /**
     * The path to the individual resource.
     * @var string
     */
    public $resourceURI;

    /**
     * The canonical name.
     * @var string
     */
    public $name;

}