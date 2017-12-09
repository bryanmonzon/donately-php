<?php

use Donately\DonatelyDonations;

class DonatelyDonationsTest extends PHPUnit_Framework_TestCase
{
    public function testDonationsGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $donations = new DonatelyDonations($stub);
        $this->assertEquals('foo', $donations->getDonationsList([]));
    }
}
