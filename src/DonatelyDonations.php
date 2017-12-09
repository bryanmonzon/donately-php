<?php

namespace Donately;

class DonatelyDonations
{
    /**
     * @var DonatelyClient
     */
    private $client;

    /**
     * DonatelyDonations constructor.
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
    public function getDonationsList($options)
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
