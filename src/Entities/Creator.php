<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Creator
 * @package OtherCode\Marvel\Entities
 */
class Creator extends Entity
{
    public $id;
    public $firstName;
    public $middleName;
    public $lastName;
    public $suffix;
    public $fullName;
    public $modified;
    public $resourceURI;
    public $urls;
    public $thumbnail;
    public $series;
    public $stories;
    public $comics;
    public $events;
}