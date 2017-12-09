<?php

use Donately\DonatelyCampaigns;

class DonatelyCampaignsTest extends PHPUnit_Framework_TestCase
{
    public function testCampaignsGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }
        
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaigns = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaigns->getCampaignsList([]));
    }

    public function testCampaignGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }

        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaign = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaign->getCampaign('cmp_b12f6ac43b2e', []));
    }
}
