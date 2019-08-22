<?php


namespace Tombabolewski\Openiai\Structure;


class ApiVersion
{
    protected $version;
    protected $availableVersions;
    protected $gate;

    /**
     * ApiVersion constructor.
     * @param $versionSignature
     */
    public function __construct($versionSignature)
    {
        $this->version = $versionSignature;
    }

    /**
     * @param $gateName
     */
    public function setGate($gateName)
    {
        $this->gate = new ApiGate($gateName);
    }

    /**
     * @param $name
     * @param $arguments
     * @return ApiGate
     */
    public function __call($name, $arguments): ApiGate
    {
        $this->setGate($name);

        return $this->gate;
    }

    /**
     * @return array
     */
    public function getAvailableVersions(): array
    {
        return $this->availableVersions;
    }

    /**
     * @param mixed $availableVersions
     *
     * @return ApiVersion
     */
    public function setAvailableVersions(array $availableVersions)
    {
        $this->availableVersions = $availableVersions;

        return $this;
    }
}