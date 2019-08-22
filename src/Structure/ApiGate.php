<?php


namespace Tombabolewski\Openiai\Structure;


class ApiGate
{
    protected $name;
    protected $method;
    protected $availableGates;

    /**
     * ApiGate constructor.
     * @param $gateName
     */
    public function __construct($gateName)
    {
        $this->name = $gateName;
    }

    /**
     * @param mixed $availableGates
     * @return ApiGate
     */
    public function setAvailableGates($availableGates)
    {
        $this->availableGates = $availableGates;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableGates()
    {
        return $this->availableGates;
    }

}