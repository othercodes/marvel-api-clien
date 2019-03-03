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

    /**
     * The internal data type
     * @var string
     */
    protected $type = '\OtherCode\Marvel\Entity';

    /**
     * The results returned by the call
     * @var Data
     */
    public $data;

    /**
     * Wrapper constructor.
     * @param null $source
     * @param string $type
     */
    public function __construct($source = null, $type = '\OtherCode\Marvel\Entity')
    {
        $this->setType($type);

        parent::__construct($source);
    }

    /**
     * Set the data type
     * @param $type
     */
    public function setType($type)
    {
        $this->type = trim($type);
    }

    /**
     * Build the data container using the proper data models
     * @param $data
     */
    public function setData($data)
    {
        $this->data = (new Data(['type' => $this->type]))->hydrate($data);
    }
}