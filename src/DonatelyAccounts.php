<?php

namespace Donately;

class DonatelyAccounts
{
    /**
     * @var DonatelyClient
     */
    private $client;

    /**
     * DonatelyAccounts constructor.
     *
     * @param DonatelyClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getAccountsList($options)
    {
        return $this->client->get('accounts', $options);
    }

    /**
     * @param string $id
     * @param array  $options
     *
     * @return array
     */
    public function getAccount($id, $options = [])
    {
        $path = $this->accountPath($id);

        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function accountPath($id)
    {
        return 'accounts/'.$id;
    }
}
