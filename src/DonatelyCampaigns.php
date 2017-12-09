<?php

namespace Donately;

class DonatelyCampaigns
{
    /**
     * @var DonatelyClient
     */
    private $client;

    /**
     * DonatelyCampaigns constructor.
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
    public function getCampaignsList($options)
    {
        return $this->client->get('admin/campaigns', $options);
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getCampaign($id, $options = [])
    {
        $path = $this->campaignPath($id);

        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function campaignPath($id)
    {
        return 'admin/campaigns/'.$id;
    }
}
