<?php

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Price
 * @property string $type
 * @property float $price
 * @package OtherCode\Marvel\Entities
 */
class Price extends Entity
{
    /**
     * A description of the price (e.g. print price, digital price).
     * @var string
     */
    protected $type;

    /**
     * The price (all prices in USD)
     * @var float
     */
    protected $price;

    /**
     * Set the price property
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = (float)$price;
    }
}