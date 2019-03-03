<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class TextObject
 * @property string $type
 * @property string $language
 * @property string $text
 * @package OtherCode\Marvel\Entities
 */
class TextObject extends Entity
{
    /**
     * The canonical type of the text object (e.g. solicit text, preview text, etc.).
     * @var string
     */
    protected $type;

    /**
     * The IETF language tag denoting the language the text object is written in.
     * @var string
     */
    protected $language;

    /**
     * The text.
     * @var string
     */
    protected $text;

}