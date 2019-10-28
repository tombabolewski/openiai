<?php


namespace Tombabolewski\Openiai\Structure;


class ApiGate
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var ApiMethod $method
     */
    protected $method;
    /**
     * @var
     */
    protected $availableGates;

    /**
     * ApiGate constructor.
     *
     * @param $gateName
     */
    public function __construct($gateName)
    {
        $this->name = $gateName;
    }

    /**
     * @param mixed $availableGates
     *
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

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return ApiMethod
     */
    public function setMethod($method): ApiMethod
    {
        $this->method = new ApiMethod($method);

        return $this->method;
    }

}