<?php

namespace Donately;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class DonatelyClient
{
    /**
     * @var Client
     */
    private $http_client;

    /**
     * @var string API password authentication
     */
    protected $api_key;

    /**
     * @var string API password authentication
     */
    protected $sub_domain;

    /**
     * @var string Extra Guzzle Requests Options
     */
    protected $extraGuzzleRequestsOptions;

    /**
     * @var DonatelyUsers
     */
    public $accounts;

    /**
     * @var DonatelyUsers
     */
    public $campaigns;

    /**
     * @var DonatelyUsers
     */
    public $people;

    /**
     * @var DonatelyUsers
     */
    public $donations;

    /**
     * @var int[]
     */
    protected $rateLimitDetails = [];

    public function __construct($sub_domain, $api_key, $extraGuzzleRequestsOptions = [])
    {
        $this->setDefaultClient();
        $this->accounts = new DonatelyAccounts($this);
        $this->campaigns = new DonatelyCampaigns($this);
        $this->people = new DonatelyPeople($this);
        $this->donations = new DonatelyDonations($this);

        $this->api_key = $api_key;
        $this->sub_domain = $sub_domain;
        $this->extraGuzzleRequestsOptions = $extraGuzzleRequestsOptions;
    }

    private function setDefaultClient()
    {
        $this->http_client = new Client();
    }

    /**
     * Sets GuzzleHttp client.
     *
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->http_client = $client;
    }

    /**
     * Returns authentication parameters.
     *
     * @return array
     */
    public function getApiKey()
    {
        return 'Basic '.base64_encode($this->api_key);
    }

    /**
     * @param string $endpoint
     * @param array  $query
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function get($endpoint, $query)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'query'   => $query,
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => $this->getApiKey(),
            ],
            ]
        );

        $response = $this->http_client->request('GET', "https://$this->sub_domain.dntly.com/api/v1/$endpoint", $guzzleRequestOptions);

        return $this->handleResponse($response);
    }

    /**
     * Returns Guzzle Requests Options Array.
     *
     * @param array $defaultGuzzleRequestsOptions
     *
     * @return array
     */
    public function getGuzzleRequestOptions($defaultGuzzleRequestOptions = [])
    {
        return array_replace_recursive($this->extraGuzzleRequestsOptions, $defaultGuzzleRequestOptions);
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    private function handleResponse(Response $response)
    {
        $this->setRateLimitDetails($response);
        $stream = \GuzzleHttp\Psr7\stream_for($response->getBody());
        $data = json_decode($stream);

        return $data;
    }

    /**
     * @param Response $response
     *
     * @return void
     */
    private function setRateLimitDetails(Response $response)
    {
        $this->rateLimitDetails = [
            'limit' => $response->hasHeader('X-RateLimit-Limit')
                ? (int) $response->getHeader('X-RateLimit-Limit')[0]
                : null,
            'remaining' => $response->hasHeader('X-RateLimit-Remaining')
                ? (int) $response->getHeader('X-RateLimit-Remaining')[0]
                : null,
            'reset_at' => $response->hasHeader('X-RateLimit-Reset')
                ? (new \DateTimeImmutable())->setTimestamp((int) $response->getHeader('X-RateLimit-Reset')[0])
                : null,
        ];
    }

    /**
     * @return int[]
     */
    public function getRateLimitDetails()
    {
        return $this->rateLimitDetails;
    }
}
