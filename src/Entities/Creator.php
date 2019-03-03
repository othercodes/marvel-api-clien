<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Creator
 * @property int $id
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $suffix
 * @property string $fullName
 * @property string $modified
 * @property EntityList|Series[] $series
 * @property EntityList|Story[] $stories
 * @property EntityList|Comic[] $comics
 * @property EntityList|Event[] $events
 * @package OtherCode\Marvel\Entities
 */
class Creator extends Entity
{
    /**
     * The unique ID of the creator resource.
     * @var int
     */
    protected $id;

    /**
     * The first name of the creator.
     * @var string
     */
    protected $firstName;

    /**
     * The middle name of the creator.
     * @var string
     */
    protected $middleName;

    /**
     * The last name of the creator.
     * @var string
     */
    protected $lastName;

    /**
     * The suffix or honorific for the creator.
     * @var string
     */
    protected $suffix;

    /**
     * The full name of the creator (a space-separated concatenation of the above four fields).
     * @var string
     */
    protected $fullName;

    /**
     * The date the resource was most recently modified.
     * @var string
     */
    protected $modified;

    /**
     * The canonical URL identifier for this resource.
     * @var string
     */
    protected $resourceURI;

    /**
     * A set of public web site URLs for the resource.
     * @var Url[]
     */
    protected $urls;

    /**
     * The representative image for this creator.
     * @var Image
     */
    protected $thumbnail;

    /**
     * A resource list containing the series which feature work by this creator.
     * @var Series[]|EntityList
     */
    protected $series;

    /**
     * A resource list containing the stories which feature work by this creator.
     * @var Story[]|EntityList
     */
    protected $stories;

    /**
     * A resource list containing the comics which feature work by this creator.
     * @var Comic[]|EntityList
     */
    protected $comics;

    /**
     * A resource list containing the events which feature work by this creator.
     * @var Event[]|EntityList
     */
    protected $events;

    /**
     * Set the creators property
     * @param $series
     */
    public function setSeries($series)
    {
        $this->series = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Series']))->hydrate($series);
    }

    /**
     * Set the Stories property
     * @param $stories
     */
    public function setStories($stories)
    {
        $this->stories = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Story']))->hydrate($stories);
    }

    /**
     * Set the Stories property
     * @param $comics
     */
    public function setComics($comics)
    {
        $this->comics = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Comic']))->hydrate($comics);
    }

    /**
     * Set the events property
     * @param $events
     */
    public function setEvents($events)
    {
        $this->events = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Event']))->hydrate($events);
    }
}