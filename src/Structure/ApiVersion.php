<?php


namespace Tombabolewski\Openiai\Structure;


class ApiVersion
{
    /**
     * @var int $version
     */
    protected $version;
    /**
     * @var array $availableVersions
     */
    protected $availableVersions;
    /**
     * @var ApiGate $gate
     */
    protected $gate;

    /**
     * ApiVersion constructor.
     *
     * @param $versionSignature
     */
    public function __construct($versionSignature)
    {
        $this->version = $versionSignature;
    }

    /**
     * @param $gateName
     *
     * @return ApiGate
     */
    public function setGate($gateName): ApiGate
    {
        $this->gate = new ApiGate($gateName);

        return $this->gate;
    }

    /**
     * @param $name
     * @param $arguments
     *
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

    /**
     * @return mixed
     */
    public function getGate()
    {
        return $this->gate;
    }
}