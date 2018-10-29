<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Serie
 * @package OtherCode\Marvel\Entities
 */
class Series extends Entity
{
    public $id;
    public $title;
    public $description;
    public $resourceURI;
    public $urls;
    public $startYear;
    public $endYear;
    public $rating;
    public $modified;
    public $thumbnail;
    public $comics;
    public $stories;
    public $events;
    public $characters;
    public $creators;
    public $next;
    public $previous;
}