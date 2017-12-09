<?php

use Donately\DonatelyDonations;

class DonatelyDonationsTest extends PHPUnit_Framework_TestCase
{
    public function testDonationsGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }
        
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $donations = new DonatelyDonations($stub);
        $this->assertEquals('foo', $donations->getDonationsList([]));
    }
}
