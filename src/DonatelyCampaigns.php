<?php

namespace Donately;

class DonatelyCampaigns
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

    public function getCampaignsList($options)
    {
        return $this->client->get('admin/campaigns', $options);
    }

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
