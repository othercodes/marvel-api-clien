<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Event
 * @package OtherCode\Marvel\Entities
 */
class Event extends Entity
{
    public $id;
    public $title;
    public $description;
    public $resourceURI;
    public $urls;
    public $modified;
    public $start;
    public $end;
    public $thumbnail;
    public $comics;
    public $stories;
    public $series;
    public $characters;
    public $creators;
    public $next;
    public $previous;
}