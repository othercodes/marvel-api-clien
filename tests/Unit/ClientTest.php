<?php


namespace Test\Unit;

use OtherCode\Marvel\Configuration;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Test\TestCase;

class ClientTest extends TestCase
{
    public function testInstantiation()
    {
        $cfg = \Mockery::mock(Configuration::class);
        $cfg->expects('set');
        $cfg->uri = 'http://gateway.marvel.com';

        $http = \Mockery::mock(ClientInterface::class);
        $logger = \Mockery::mock(LoggerInterface::class);

        $logger->expects('debug')->once();

        $m = new \OtherCode\Marvel\Client($cfg, $http, $logger);
        $this->assertInstanceOf(\OtherCode\Marvel\Client::class, $m);

        $this->assertInstanceOf(Configuration::class, $m->getConfiguration());
        $this->assertInstanceOf(ClientInterface::class, $m->getHttpClient());
        $this->assertInstanceOf(LoggerInterface::class, $m->getLogger());

        return $m;
    }

    /**
     * @depends testInstantiation
     *
     * @param \OtherCode\Marvel\Client $m
     */
    public function testBuildQuery(\OtherCode\Marvel\Client $m)
    {
        $query = '?' . http_build_query([
                'ts' => 123,
                'apikey' => 'SomePublicKey',
                'hash' => md5(123 . 'SomePrivateKey' . 'SomePublicKey')
            ]);

        $this->assertEquals($query, $m->buildQuery('SomePublicKey', 'SomePrivateKey', 123));


    }
}