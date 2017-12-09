<?php

use Donately\DonatelyClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

class DonatelyClientTest extends PHPUnit_Framework_TestCase
{
    public function testBasicClient()
    {
        $mock = new MockHandler(
            [
            new Response(200, ['X-Foo' => 'Bar'], '{"foo":"bar"}'),
            ]
        );
        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $http_client = new Client(['handler' => $stack]);

        $client = new DonatelyClient(getenv('DONATELY_SUBDOMAIN'), getenv('DONATELY_API_KEY'));

        $client->accounts->getAccounts([]);

        foreach ($container as $transaction) {
            $basic = $transaction['request']->getHeaders()['Authorization'][0];

            $this->assertTrue($basic == 'Basic dTpw');
        }
    }
}
