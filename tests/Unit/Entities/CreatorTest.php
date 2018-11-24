<?php

namespace Test\Unit\Entities;

use OtherCode\Marvel\Entities\Creator;
use Test\TestCase;

class CreatorTest extends TestCase
{
    public function testSetSeries()
    {
        $creator = new Creator();
        $creator->setSeries([
            "available" => 0,
            "collectionURI" => "http://gateway.marvel.com/v1/public/creators/7968/series",
            "items" => [],
            "returned" => 0
        ]);

        $this->assertInternalType('string', $creator->series->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/series',
            $creator->series->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->series);
        $this->assertEquals('\OtherCode\Marvel\Entities\Series', $creator->series->type);
        $this->assertInternalType('array', $creator->series->items);
        $this->assertCount(0, $creator->series->items);
        $this->assertEquals(0, $creator->series->available);
        $this->assertEquals(0, $creator->series->returned);
    }

    public function testSetStories()
    {
        $creator = new Creator();
        $creator->setStories([
            "available" => 0,
            "collectionURI" => "http://gateway.marvel.com/v1/public/creators/7968/stories",
            "items" => [],
            "returned" => 0
        ]);

        $this->assertInternalType('string', $creator->stories->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/stories',
            $creator->stories->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->stories);
        $this->assertEquals('\OtherCode\Marvel\Entities\Story', $creator->stories->type);
        $this->assertInternalType('array', $creator->stories->items);
        $this->assertCount(0, $creator->stories->items);
        $this->assertEquals(0, $creator->stories->available);
        $this->assertEquals(0, $creator->stories->returned);
    }

    public function testSetEvents()
    {
        $creator = new Creator();
        $creator->setEvents([
            "available" => 0,
            "collectionURI" => "http://gateway.marvel.com/v1/public/creators/7968/events",
            "items" => [],
            "returned" => 0
        ]);

        $this->assertInternalType('string', $creator->events->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/events',
            $creator->events->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->events);
        $this->assertEquals('\OtherCode\Marvel\Entities\Event', $creator->events->type);
        $this->assertInternalType('array', $creator->events->items);
        $this->assertCount(0, $creator->events->items);
        $this->assertEquals(0, $creator->events->available);
        $this->assertEquals(0, $creator->events->returned);
    }

    public function testSetComics()
    {
        $creator = new Creator();
        $creator->setComics([
            "available" => 0,
            "collectionURI" => "http://gateway.marvel.com/v1/public/creators/7968/comics",
            "items" => [],
            "returned" => 0
        ]);

        $this->assertInternalType('string', $creator->comics->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/comics',
            $creator->comics->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->comics);
        $this->assertEquals('\OtherCode\Marvel\Entities\Comic', $creator->comics->type);
        $this->assertInternalType('array', $creator->comics->items);
        $this->assertCount(0, $creator->comics->items);
        $this->assertEquals(0, $creator->comics->available);
        $this->assertEquals(0, $creator->comics->returned);
    }

    public function testHydration()
    {
        $creator = new Creator($this->getJSONFileContent(__DIR__ . '/CreatorSample.json'));

        $this->assertEquals(7968, $creator->id);
        $this->assertEquals('First Name', $creator->firstName);
        $this->assertEquals('Middle Name', $creator->middleName);
        $this->assertEquals('Last Name', $creator->lastName);
        $this->assertEquals('some_suffix_', $creator->suffix);
        $this->assertEquals('First Middle Last Names', $creator->fullName);
        $this->assertEquals('-0001-11-30T00:00:00-0500', $creator->modified);

        $this->assertInternalType('string', $creator->series->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/series',
            $creator->series->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->series);
        $this->assertEquals('\OtherCode\Marvel\Entities\Series', $creator->series->type);
        $this->assertInternalType('array', $creator->series->items);
        $this->assertCount(0, $creator->series->items);
        $this->assertEquals(0, $creator->series->available);
        $this->assertEquals(0, $creator->series->returned);

        $this->assertInternalType('string', $creator->stories->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/stories',
            $creator->stories->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->stories);
        $this->assertEquals('\OtherCode\Marvel\Entities\Story', $creator->stories->type);
        $this->assertInternalType('array', $creator->stories->items);
        $this->assertCount(0, $creator->stories->items);
        $this->assertEquals(0, $creator->stories->available);
        $this->assertEquals(0, $creator->stories->returned);

        $this->assertInternalType('string', $creator->events->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/events',
            $creator->events->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->events);
        $this->assertEquals('\OtherCode\Marvel\Entities\Event', $creator->events->type);
        $this->assertInternalType('array', $creator->events->items);
        $this->assertCount(0, $creator->events->items);
        $this->assertEquals(0, $creator->events->available);
        $this->assertEquals(0, $creator->events->returned);

        $this->assertInternalType('string', $creator->comics->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/creators/7968/comics',
            $creator->comics->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $creator->comics);
        $this->assertEquals('\OtherCode\Marvel\Entities\Comic', $creator->comics->type);
        $this->assertInternalType('array', $creator->comics->items);
        $this->assertCount(0, $creator->comics->items);
        $this->assertEquals(0, $creator->comics->available);
        $this->assertEquals(0, $creator->comics->returned);
    }
}
