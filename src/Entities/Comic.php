<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Comic
 * @package OtherCode\Marvel\Entities
 */
class Comic extends Entity
{
    /**
     * The unique ID of the comic resource.
     * @var int
     */
    public $id;

    /**
     * The ID of the digital comic representation of this comic.
     * Will be 0 if the comic is not available digitally.
     * @var int
     */
    public $digitalId;

    /**
     * The canonical title of the comic.
     * @var string
     */
    public $title;

    /**
     * The number of the issue in the series (will generally be 0
     * for collection formats).
     * @var int
     */
    public $issueNumber;

    /**
     * If the issue is a variant (e.g. an alternate cover, second
     * printing, or director's cut), a text description of the variant.
     * @var string
     */
    public $variantDescription;

    /**
     * The preferred description of the comic.
     * @var string
     */
    public $description;

    /**
     * The date the resource was most recently modified.
     * @var string
     */
    public $modified;

    /**
     * The ISBN for the comic (generally only populated for collection formats).
     * @var string
     */
    public $isbn;

    /**
     * @var string
     */
    public $upc;

    public $diamondCode;

    public $ean;

    public $issn;

    public $format;

    public $pageCount;

    public $textObjects;

    public $resourceURI;

    public $urls;

    public $series;

    public $variants;

    public $collections;

    public $collectedIssues;

    public $dates;

    public $prices;

    public $thumbnail;

    public $images;

    public $creators;

    public $characters;

    public $stories;

    public $events;

}