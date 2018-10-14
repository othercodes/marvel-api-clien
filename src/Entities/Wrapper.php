<?php

namespace OtherCode\Marvel\Entities;

use OtherCode\Marvel\Entity;

/**
 * Class Wrapper
 * @package OtherCode\Marvel\Entities
 */
class Wrapper extends Entity
{
    /**
     * The HTTP status code of the returned result
     * @var int
     */
    public $code;

    /**
     * A string description of the call status
     * @var string
     */
    public $status;

    /**
     * The results returned by the call
     * @var Data
     */
    public $data;

    /**
     * A digest value of the content
     * @var string
     */
    public $etag;

    /**
     * The copyright notice for the returned result
     * @var string
     */
    public $copyright;

    /**
     * The attribution notice for this result
     * @var string
     */
    public $attributionText;

    /**
     * An HTML representation of the attribution notice for this result
     * @var string
     */
    public $attributionHTML;


}