<?php


namespace Tombabolewski\Openiai;

use Tombabolewski\Openiai\Structure\ApiVersion;

class Client
{
    protected $version;

    public function __construct($version = 0)
    {
        if (!$version) {
            $version = config('API_DEFAULT_VERSION');
        }
        $this->setVersion($version);
    }

    public function setVersion($versionSignature)
    {
        $this->version = new ApiVersion($versionSignature);
    }
}