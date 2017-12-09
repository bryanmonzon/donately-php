<?php

use Donately\DonatelyAccounts;

class DonatelyAccountsTest extends PHPUnit_Framework_TestCase
{
    public function testAccountsGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $accounts = new DonatelyAccounts($stub);
        $this->assertEquals('foo', $accounts->getAccountsList([]));
    }

    public function testAccountGet()
    {
        $stub = $this->getMockBuilder('Donately\DonatelyClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $accounts = new DonatelyAccounts($stub);
        $this->assertEquals('foo', $accounts->getAccount('act_ba7d12ab27bb', []));
    }
}
