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

    public function characters()
    {

    }

    public function character($id)
    {

    }

    /**
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function comics()
    {
        $timestamp = time();

        $response = $this->http->request('GET', trim($this->configuration->uri . '/v1/public/characters'), [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'ts' => $timestamp,
                'apikey' => $this->configuration->publicKey,
                'hash' => md5($timestamp . $this->configuration->privateKey . $this->configuration->publicKey),
            ]
        ]);

        $body = json_decode($response->getBody()->getContents());

        return new Wrapper($body);

    }

    public function comic($id)
    {

    }

    public function creators()
    {
    }

    public function creator($id)
    {
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