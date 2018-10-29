<?php
/**
 * Created by PhpStorm.
 * User: usantisteban
 * Date: 28/10/18
 * Time: 21:33
 */

namespace OtherCode\Marvel\Entities;


use OtherCode\Marvel\Entity;

/**
 * Class Date
 * @property string $type
 * @property \DateTime $date
 * @package OtherCode\Marvel\Entities
 */
class Date extends Entity
{

    /**
     * A description of the date (e.g. onsale date, FOC date).
     * @var string
     */
    protected $type;

    /**
     * The date.
     * @var \DateTime
     */
    protected $date;
    
}