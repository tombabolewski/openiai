<?php


namespace Tombabolewski\Openiai\Structure;

use Guzzle\Http\Client as HttpClient;
use Tombabolewski\Openiai\Constants;

class Client
{
    protected $version;

    public function __construct($version = Constants::API_DEFAULT_VERSION)
    {
        $this->setVersion($version);
    }

    public function setVersion($versionSignature)
    {
        $this->version = new ApiVersion($versionSignature);
    }
}