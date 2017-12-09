<?php

use Donately\DonatelyFundraisers;

class DonatelyFundraisersTest extends PHPUnit_Framework_TestCase
{
    public function testFundraisersGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }

        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $fundraisers = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $fundraisers->getFundraisersList([]));
    }

    public function testFundraiserGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }
        
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $fundraiser = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $fundraiser->getFundraiser('fun_0e9146352966', []));
    }
}
