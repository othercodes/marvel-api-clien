<?php

namespace Test\Unit\Entities;

use OtherCode\Marvel\Entities\Series;
use Test\TestCase;

class SeriesTest extends TestCase
{
    public function testSetSeries()
    {
        $series = new Series();
    }

    public function testHydration()
    {
        $series = new Series($this->getJSONFileContent(__DIR__ . '/SeriesSample.json'));

    }
}
