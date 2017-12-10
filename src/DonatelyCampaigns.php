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
     * Creates a campaign.
     *
     * @param array $options
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function create($options)
    {
        return $this->client->post('admin/campaigns', $options);
    }

    /**
     * Updates a campaign. Basically a wrapper
     * for the create method since they both post
     *
     * @param array $options
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function update($options)
    {
        return $this->create($options);
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
