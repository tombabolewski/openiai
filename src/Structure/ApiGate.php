<?php


namespace Tombabolewski\Openiai\Structure;


final class ApiGate
{
    private $name;
    private $version;

    public function __construct(int $version, string $name)
    {
        $this->version = $version;
        $this->name = $name;
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
        /** @var ApiGate $gateClass */
        $methodClass = ClassMap::getMethodClassName($this->version, $this->name, $name);
        throw_if($methodClass === null, 'No such gate/method');
        new $methodClass();
    }

}
