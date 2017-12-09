<?php

use Donately\DonatelyPeople;

class DonatelyPeopleTest extends PHPUnit_Framework_TestCase
{
    public function testPeopleGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $people = new DonatelyPeople($stub);
        $this->assertEquals('foo', $people->getPeople([]));
    }

    public function testPersonGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $people = new DonatelyPeople($stub);
        $this->assertEquals('foo', $people->getPerson('per_3f76f0e81754', []));
    }
}
