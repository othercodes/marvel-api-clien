<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Image
 * @property string $path
 * @property string $extension
 * @package OtherCode\Marvel\Entities
 */
class Image extends Entity
{
    /**
     * The directory path of to the image.
     * @var string
     */
    protected $path;

    /**
     * The file extension for the image.
     * @var string
     */
    protected $extension;

}