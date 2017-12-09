<?php

namespace Donately;

class DonatelyPeople
{
    /**
     * @var DonatelyClient
     */
    private $client;

    /**
     * DonatelyPeople constructor.
     *
     * @param DonatelyClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * 
     * @param  array $options
     * @return array
     */
    public function getPeopleList($options)
    {
        return $this->client->get('admin/people', $options);
    }

    /**
     * 
     * @param  string $id      
     * @param  array  $options
     * @return array
     */
    public function getPerson($id, $options = [])
    {
        $path = $this->peoplePath($id);

        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function peoplePath($id)
    {
        return 'admin/people/'.$id;
    }
}
