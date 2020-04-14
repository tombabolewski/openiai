<?php


namespace Tombabolewski\Openiai\Structure;


class ApiVersion
{
    protected $version;

    /**
     * ApiVersion constructor.
     * @param $versionSignature
     */
    public function __construct($versionSignature)
    {
        $this->version = $versionSignature;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return ApiGate
     * @throws \Throwable
     */
    public function __call($name, $arguments): ApiGate
    {
        return new ApiGate($this->version, $name);
    }

}
