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
     * @param ClientInterface $http
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
    protected function sendRequest($method, $path)
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

        //file_put_contents(strtr(ltrim($path, '/'), ['/' => '.']) . '.json', $response->getBody());

        return json_decode($response->getBody());
    }

    /**
     * Get the list of characters
     * @param int $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function characters($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/characters' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Character'
        );
    }

    /**
     * Get the list of comics
     * @param int|null $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function comics($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/comics' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Comic'
        );
    }

    /**
     * Get the list of creators
     * @param int|null $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function creators($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/creators' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Creators'
        );
    }

    /**
     * Get the list of Events
     * @param int|null $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function events($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/events' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Event'
        );
    }

    /**
     * Get the list of series
     * @param int|null $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function series($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/series' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Series'
        );
    }

    /**
     * Get the list of stories
     * @param int|null $id
     * @return Wrapper
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stories($id = null)
    {
        return new Wrapper(
            $this->sendRequest('GET', '/v1/public/stories' . (isset($id) ? '/' . trim($id) : '')),
            '\OtherCode\Marvel\Entities\Story'
        );
    }
}