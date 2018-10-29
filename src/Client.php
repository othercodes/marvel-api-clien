<?php

namespace OtherCode\Marvel;


use GuzzleHttp\ClientInterface;
use OtherCode\Marvel\Entities\Wrapper;

/**
 * Class Client
 * @package OtherCode\Marvel
 */
class Client
{

    /**
     * Main client configuration
     * @var Configuration
     */
    protected $configuration;

    /**
     * Http Client Interface
     * @var ClientInterface
     */
    protected $http;

    /**
     * Client constructor.
     * @param Configuration|null $configuration
     */
    public function __construct(Configuration $configuration, ClientInterface $http)
    {
        $this->configuration = $configuration;
        $this->http = $http;
    }

    /**
     * @param string $method Http veb GET|POST|PUT|PATCH|DELETE
     * @param string $path Valid Uri path
     * @return Object
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest($method, $path)
    {
        $timestamp = time();

        $response = $this->http->request(strtoupper($method), trim($this->configuration->uri . $path), [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'ts' => $timestamp,
                'apikey' => $this->configuration->publicKey,
                'hash' => md5($timestamp . $this->configuration->privateKey . $this->configuration->publicKey),
            ]
        ]);

        // error handling

        return json_decode($response->getBody());
    }

    /**
     * Get the list of characters
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function characters()
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/characters'),
            '\OtherCode\Marvel\Entities\Character'
        );
    }

    /**
     * Get the character by id
     * @param int $id The character id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function character($id)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/characters' . trim($id)),
            '\OtherCode\Marvel\Entities\Character'
        );
    }

    /**
     * Get the list of comics
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function comics()
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/comics'),
            '\OtherCode\Marvel\Entities\Comic'
        );
    }

    /**
     * Get a comic by id
     * @param int $id The comic id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function comic($id)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/comics/' . trim($id)),
            '\OtherCode\Marvel\Entities\Comic'
        );
    }

    public function creators()
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/creators'),
            '\OtherCode\Marvel\Entities\Creators'
        );
    }

    public function creator($id)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/creators/' . trim($id)),
            '\OtherCode\Marvel\Entities\Creators'
        );
    }

    public function events()
    {
    }

    public function event($id)
    {
    }

    public function series()
    {
    }

    public function serie($id)
    {
    }

    public function stories()
    {
    }

    public function story()
    {
    }
}