<?php


namespace Tombabolewski\Openiai;

use Tombabolewski\Openiai\Exception\InvalidStructureCallException;
use Tombabolewski\Openiai\Structure\ApiVersion;

class Client
{
    /**
     * @var ApiVersion $version
     */
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

    public function setGate($gateName)
    {
        if (empty($this->version)) {
            throw new InvalidStructureCallException('Api Version not set.');
        }

        return $this->version->setGate($gateName);
    }

    public function setMethod($methodName)
    {
        if (empty($this->version)) {
            throw new InvalidStructureCallException('Api Version not set.');
        }
        if (empty($this->version->getGate())) {
            throw new InvalidStructureCallException('Api Gate not set.');
        }

        return $this->version->getGate()->setMethod($methodName);
    }

    public function request($params = [], $page = 0)
    {
        if (empty($this->version)) {
            throw new InvalidStructureCallException('Api Version not set.');
        }
        if (empty($this->version->getGate())) {
            throw new InvalidStructureCallException('Api Gate not set.');
        }
        if (empty($this->version->getGate()->getMethod())) {
            throw new InvalidStructureCallException('Api Method not set.');
        }

        return $this->version->getGate()->getMethod()->exec($params, $page);
    }
}