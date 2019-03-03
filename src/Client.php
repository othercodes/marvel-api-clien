<?php

namespace OtherCode\Marvel;


use GuzzleHttp\Psr7\Request;
use OtherCode\Marvel\Entities\Wrapper;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

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
    private $configuration;

    /**
     * Http Client Interface
     * @var ClientInterface
     */
    private $http;

    /**
     * Logger Interface
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Client constructor.
     * @param Configuration|null $configuration
     * @param ClientInterface $http
     * @param LoggerInterface $logger
     */
    public function __construct(Configuration $configuration, ClientInterface $http, LoggerInterface $logger)
    {
        $this->setConfiguration($configuration);
        $this->setHttpClient($http);
        $this->setLogger($logger)->logger->debug("Marvel API Client Ready!");
    }

    /**
     * Set the Configuration
     * @param Configuration $configuration
     * @return Client
     */
    public function setConfiguration(Configuration $configuration): Client
    {
        $this->configuration = $configuration;
        return $this;
    }

    /**
     * Return the configuration
     * @return Configuration
     */
    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    /**
     * Set the Http Client
     * @param ClientInterface $http
     * @return Client
     */
    public function setHttpClient(ClientInterface $http): Client
    {
        $this->http = $http;
        return $this;
    }

    /**
     * Return the Http Client
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->http;
    }

    /**
     * Set the logger
     * @param LoggerInterface $logger
     * @return Client
     */
    public function setLogger(LoggerInterface $logger): Client
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Return the logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $method Http veb GET|POST|PUT|PATCH|DELETE
     * @param string $path Valid Uri path
     * @param string $type The object type
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function send(string $method, string $path, string $type = '\OtherCode\Marvel\Entity'): Wrapper
    {
        $response = $this->http->sendRequest(new Request($method, $this->configuration->uri . $path . $this->buildQuery(
                $this->configuration->publicKey,
                $this->configuration->privateKey,
                time()
            )));

        $this->logger->debug('Response: ' . $response->getBody());
        return new Wrapper(json_decode($response->getBody()), $type);
    }

    /**
     * Build the query string for the uri
     * @param string $publicKey
     * @param string $privateKey
     * @param int $timestamp
     * @return string
     */
    public function buildQuery(string $publicKey, string $privateKey, int $timestamp): string
    {
        return '?' . http_build_query([
                'ts' => $timestamp,
                'apikey' => $publicKey,
                'hash' => md5($timestamp . $privateKey . $publicKey)
            ]);
    }

    /**
     * @param string $method Http veb GET|POST|PUT|PATCH|DELETE
     * @param string $path Valid Uri path
     * @param string $type The object type
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function __invoke(string $method, string $path, string $type = '\OtherCode\Marvel\Entity'): Wrapper
    {
        return $this->send($method, $path, $type);
    }

    /**
     * Get the list of characters
     * @param int $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function characters(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/characters' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Character'
        );
    }

    /**
     * Get the list of comics
     * @param int|null $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function comics(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/comics' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Comic'
        );
    }

    /**
     * Get the list of creators
     * @param int|null $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function creators(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/creators' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Creators'
        );
    }

    /**
     * Get the list of Events
     * @param int|null $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function events(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/events' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Event'
        );
    }

    /**
     * Get the list of series
     * @param int|null $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function series(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/series' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Series'
        );
    }

    /**
     * Get the list of stories
     * @param int|null $id
     * @return Wrapper
     * @throws ClientExceptionInterface
     */
    public function stories(int $id = null): Wrapper
    {
        return $this->send(
            'GET',
            '/v1/public/stories' . (isset($id) ? '/' . trim($id) : ''),
            '\OtherCode\Marvel\Entities\Story'
        );
    }
}