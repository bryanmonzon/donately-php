<?php

namespace Donately;

class DonatelyAccounts
{
    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomUsers constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getAccounts($options)
    {
        return $this->client->get('accounts', $options);
    }

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
