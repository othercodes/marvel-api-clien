<?php

namespace OtherCode\Marvel;

/**
 * Class Configuration
 * @see https://developer.marvel.com/account
 * @property string $uri
 * @property string $privateKey
 * @property string $publicKey
 * @package OtherCode\Marvel
 */
class Configuration extends Entity
{
    /**
     * Marvel API Endpoint URI
     * @var string
     */
    protected $uri = 'http://gateway.marvel.com';

    /**
     * Private key (hash)
     * @var string
     */
    protected $privateKey;

    /**
     * Public key (hash)
     * @var string
     */
    protected $publicKey;

}