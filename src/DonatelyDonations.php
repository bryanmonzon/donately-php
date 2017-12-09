<?php

namespace Donately;

class DonatelyDonations
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

    public function getDonations($options)
    {
        return $this->client->get('donations', $options);
    }

    // public function getDonation($id, $options = [])
    // {
    //     $path = $this->donationPath($id);
    //     return $this->client->get($path, $options);
    // }

    // /**
    //  * @param string $id
    //  * @return string
    //  */
    // public function donationPath($id)
    // {
    //     return 'admin/donations/' . $id;
    // }
}
