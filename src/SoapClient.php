<?php


namespace Tombabolewski\Openiai;

use Tombabolewski\Openiai\Structure\ApiMethod;

class SoapClient
{
    /**
     * @var \SoapClient
     */
    private $client;

    public function __construct(ApiMethod $method)
    {
        $this->client = new \SoapClient();

    }
}
