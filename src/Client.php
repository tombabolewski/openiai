<?php


namespace Tombabolewski\Openiai;

use Tombabolewski\Openiai\Structure\ApiVersion;

class Client
{
    protected $version;
    protected $host;
    protected $username;
    protected $password;

    public function __construct(string $host, string $username, string $password, int $version)
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

    public function __call($name, $arguments)
    {
        return $this->version;
    }

}
