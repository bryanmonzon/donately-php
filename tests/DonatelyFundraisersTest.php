<?php

use Donately\DonatelyFundraisers;

class DonatelyFundraisersTest extends PHPUnit_Framework_TestCase
{
    public function testFundraisersGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $fundraisers = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $fundraisers->getFundraisersList([]));
    }

    public function testFundraiserGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $fundraiser = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $fundraiser->getFundraiser('fun_0e9146352966', []));
    }
}
