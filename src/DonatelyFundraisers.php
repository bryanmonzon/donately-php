<?php

namespace Donately;

class DonatelyFundraisers
{
    /**
     * @var DonatelyClient
     */
    private $client;

    /**
     * DonatelyFundraisers constructor.
     *
     * @param DonatelyClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param  array $options
     * 
     * @return array
     */
    public function getFundraisersList($options)
    {
        return $this->client->get('fundraisers', $options);
    }


    /**
     * @param  array $options
     * 
     * @return array
     */
    public function getFundraiser($id, $options = [])
    {
        $path = $this->fundraiserPath($id);

        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function fundraiserPath($id)
    {
        return 'fundraisers/'.$id;
    }
}
