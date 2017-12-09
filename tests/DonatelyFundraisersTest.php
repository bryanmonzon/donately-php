<?php

use Donately\DonatelyFundraisers;

class DonatelyFundraisersTest extends PHPUnit_Framework_TestCase
{
    public function testFundraisersGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaigns = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $campaigns->getFundraisersList([]));
    }

    public function testFundraiserGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaign = new DonatelyFundraisers($stub);
        $this->assertEquals('foo', $campaign->getFundraiser('fun_0e9146352966', []));
    }
}
