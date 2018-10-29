<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Comic
 * @property int $id
 * @property int $digitalId
 * @property string $title
 * @property double $issueNumber
 * @property string $variantDescription
 * @property string $description
 * @property string $modified
 * @property string $isbn
 * @property string $upc
 * @property string $diamondCode
 * @property string $ean
 * @property string $issn
 * @property string $format
 * @property int $pageCount
 * @property TextObject[] $textObjects
 * @property string $resourceURI
 * @property Url[] $urls
 * @property Summary $series
 * @property Summary[] $variants
 * @property Summary[] $collections
 * @property Summary[] $collectedIssues
 * @property Date[] $dates
 * @property Price[] $prices
 * @property Image $thumbnail
 * @property Image[] $images
 * @property Creator[]|EntityList $creators
 * @property Character[]|EntityList $characters
 * @property Story[]|EntityList $stories
 * @property Event[]||EntityList $events
 * @package OtherCode\Marvel\Entities
 */
class Comic extends Entity
{
    /**
     * The unique ID of the comic resource.
     * @var int
     */
    protected $id;

    /**
     * The ID of the digital comic representation of this comic.
     * Will be 0 if the comic is not available digitally.
     * @var int
     */
    protected $digitalId;

    /**
     * The canonical title of the comic.
     * @var string
     */
    protected $title;

    /**
     * The number of the issue in the series (will generally be 0
     * for collection formats).
     * @var int
     */
    protected $issueNumber;

    /**
     * If the issue is a variant (e.g. an alternate cover, second
     * printing, or director's cut), a text description of the variant.
     * @var string
     */
    protected $variantDescription;

    /**
     * The preferred description of the comic.
     * @var string
     */
    protected $description;

    /**
     * The date the resource was most recently modified.
     * @var string
     */
    protected $modified;

    /**
     * The ISBN for the comic (generally only populated for collection formats).
     * @var string
     */
    protected $isbn;

    /**
     * The UPC barcode number for the comic (generally only populated for periodical formats).
     * @var string
     */
    protected $upc;

    /**
     * The Diamond code for the comic.
     * @var string
     */
    protected $diamondCode;

    /**
     * The EAN barcode for the comic.
     * @var string
     */
    protected $ean;

    /**
     * The ISSN barcode for the comic.
     * @var string
     */
    protected $issn;

    /**
     * The publication format of the comic e.g. comic, hardcover, trade paperback.
     * @var string
     */
    protected $format;

    /**
     * The number of story pages in the comic.
     * @var int
     */
    protected $pageCount;

    /**
     * A set of descriptive text blurbs for the comic.
     * @var array
     */
    protected $textObjects;

    /**
     * The canonical URL identifier for this resource.
     * @var Entity
     */
    protected $resourceURI;

    /**
     * A set of public web site URLs for the resource.
     * @var Url[]
     */
    protected $urls;

    /**
     * A summary representation of the series to which this comic belongs.
     * @var Summary
     */
    protected $series;

    /**
     * A list of variant issues for this comic (includes the "original"
     * issue if the current issue is a variant).
     * @var Summary[]
     */
    protected $variants;

    /**
     * A list of collections which include this comic (will generally be
     * empty if the comic's format is a collection).
     * @var Summary[]
     */
    protected $collections;

    /**
     * A list of issues collected in this comic (will generally be empty
     * for periodical formats such as "comic" or "magazine").
     * @var Summary[]
     */
    protected $collectedIssues;

    /**
     * A list of key dates for this comic
     * @var Date[]
     */
    protected $dates;

    /**
     * A list of prices for this comic.
     * @var Price[]
     */
    protected $prices;

    /**
     * The representative image for this comic.
     * @var Image
     */
    protected $thumbnail;

    /**
     * A list of promotional images associated with this comic.
     * @var Image[]
     */
    protected $images;

    /**
     * A resource list containing the creators associated with this comic.
     * @var Creator[]|EntityList
     */
    protected $creators;

    /**
     * A resource list containing the characters which appear in this comic.
     * @var Character[]|EntityList
     */
    protected $characters;

    /**
     * A resource list containing the stories which appear in this comic.
     * @var Story[]|EntityList
     */
    protected $stories;

    /**
     * A resource list containing the events in which this comic appears.
     * @var Event[]|EntityList
     */
    protected $events;

    /**
     * Set the textObjects property
     * @param $textObjects
     */
    public function setTextObjects($textObjects)
    {
        $this->textObjects = Entity::entitize('TextObject', $textObjects);
    }

    /**
     * Set the series property
     * @param $series
     */
    public function setSeries($series)
    {
        $this->series = new Summary($series);
    }

    /**
     * Set the variants property
     * @param array $variants
     */
    public function setVariants($variants)
    {
        $this->variants = Entity::entitize('Summary', $variants);
    }

    /**
     * Set the dates property
     * @param array $dates
     */
    public function setDates($dates)
    {
        $this->dates = Entity::entitize('Date', $dates);
    }

    /**
     * Set the prices property
     * @param array $price
     */
    public function setPrices($price)
    {
        $this->prices = Entity::entitize('Price', $price);
    }

    /**
     * Set the images property
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = Entity::entitize('Image', $images);
    }

    /**
     * Set the creators property
     * @param $creators
     */
    public function setCreators($creators)
    {
        $this->creators = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Creator']))->hydrate($creators);
    }

    /**
     * Set the characters property
     * @param $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Character']))->hydrate($characters);
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
     * Set the events property
     * @param $events
     */
    public function setEvents($events)
    {
        $this->events = (new EntityList(['type' => '\OtherCode\Marvel\Entities\Event']))->hydrate($events);
    }

}