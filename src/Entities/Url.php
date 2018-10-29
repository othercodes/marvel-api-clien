<?php

namespace OtherCode\Marvel\Entities;

use OtherCode\Marvel\Entity;

/**
 * Class Url
 * @package OtherCode\Marvel\Entities
 */
class Url extends Entity
{
    /**
     * A text identifier for the URL.
     * @var string
     */
    public $type;

    /**
     * A full URL (including scheme, domain, and path).
     * @var string
     */
    public $url;

}