<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Character
 * @package OtherCode\Marvel\Entities
 */
class Character extends Entity
{
    public $id;
    public $name;
    public $description;
    public $modified;
    public $resourceURI;
    public $urls;
    public $thumbnail;
    public $comics;
    public $stories;
    public $events;
    public $series;
}