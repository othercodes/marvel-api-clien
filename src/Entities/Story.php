<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Story
 * @package OtherCode\Marvel\Entities
 */
class Story extends Entity
{
    public $id;
    public $title;
    public $description;
    public $resourceURI;
    public $type;
    public $modified;
    public $thumbnail;
    public $comics;
    public $series;
    public $events;
    public $characters;
    public $creators;
    public $originalissue;
}