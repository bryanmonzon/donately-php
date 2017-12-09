<?php

use Donately\DonatelyAccounts;

class DonatelyAccountsTest extends PHPUnit_Framework_TestCase
{
    public function testAccountsGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }

        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $accounts = new DonatelyAccounts($stub);
        $this->assertEquals('foo', $accounts->getAccountsList([]));
    }

    public function testAccountGet()
    {
        $DONATELY_API_KEY = getenv('DONATELY_API_KEY');
        if (!$DONATELY_API_KEY) {
            $this->markTestSkipped('No API key in ENV');
        }
        
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $accounts = new DonatelyAccounts($stub);
        $this->assertEquals('foo', $accounts->getAccount('act_ba7d12ab27bb', []));
    }
}
