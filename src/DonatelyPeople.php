<?php

namespace Donately;

class DonatelyPeople
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

    public function getPeople($options)
    {
        return $this->client->get('admin/people', $options);
    }

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
