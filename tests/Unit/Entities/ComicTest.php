<?php

namespace Test\Unit\Entities;

use OtherCode\Marvel\Entities\Comic;

class ComicTest extends \PHPUnit_Framework_TestCase
{

    public function testSetVariants()
    {
        $comic = new Comic();
        $comic->setVariants([]);

        $this->assertInternalType('array', $comic->variants);
        $this->assertCount(0, $comic->variants);
    }

    public function testSetDates()
    {
        $comic = new Comic();
    }

    public function testSetPrices()
    {
        $comic = new Comic();
    }

    public function testSetEvents()
    {
        $comic = new Comic();
    }

    public function testSetTextObjects()
    {
        $comic = new Comic();
    }

    public function testSetStories()
    {
        $comic = new Comic();
    }

    public function testSetSeries()
    {
        $comic = new Comic();
    }

    public function testSetImages()
    {
        $comic = new Comic();
    }

    public function testSetCreators()
    {
        $comic = new Comic();
    }

    public function testSetCharacters()
    {
        $comic = new Comic();
        $comic->setCharacters([
            "available" => 0,
            "collectionURI" => "http://gateway.marvel.com/v1/public/comics/2088/characters",
            "items" => [],
            "returned" => 0
        ]);

        $this->assertInternalType('string', $comic->characters->collectionURI);
        $this->assertEquals('http://gateway.marvel.com/v1/public/comics/2088/characters',
            $comic->characters->collectionURI);
        $this->assertInstanceOf('\OtherCode\Marvel\Entities\EntityList', $comic->characters);
        $this->assertEquals('\OtherCode\Marvel\Entities\Character', $comic->characters->type);
        $this->assertInternalType('array', $comic->characters->items);
        $this->assertCount(0, $comic->characters->items);
        $this->assertEquals(0, $comic->characters->available);
        $this->assertEquals(0, $comic->characters->returned);
    }

    public function testHydration()
    {
        $comic = new Comic();
    }
}
