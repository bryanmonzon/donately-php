<?php

use Donately\DonatelyCampaigns;

class DonatelyCampaignsTest extends PHPUnit_Framework_TestCase
{
    public function testCampaginCreate()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');
        $campaigns = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaigns->create([]));
    }

    public function testCampaginUpdate()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');
        $campaigns = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaigns->update([]));
    }

    public function testCampaignsGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaigns = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaigns->getCampaignsList([]));
    }

    public function testCampaignGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $campaign = new DonatelyCampaigns($stub);
        $this->assertEquals('foo', $campaign->getCampaign('cmp_b12f6ac43b2e', []));
    }
}
