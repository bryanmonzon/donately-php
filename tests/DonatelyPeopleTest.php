<?php

use Donately\DonatelyPeople;

class DonatelyPeopleTest extends PHPUnit_Framework_TestCase
{
    public function testPeopleGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }

        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $people = new DonatelyPeople($stub);
        $this->assertEquals('foo', $people->getPeopleList([]));
    }

    public function testPersonGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }
        
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $person = new DonatelyPeople($stub);
        $this->assertEquals('foo', $person->getPerson('per_3f76f0e81754', []));
    }
}
