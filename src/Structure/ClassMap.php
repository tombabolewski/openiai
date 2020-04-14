<?php


namespace Tombabolewski\Openiai\Structure;


final class ClassMap
{


    public static function getMethodClassName(int $version, string $gateName, string $methodName): string
    {
        $gate_name = 'Tombabolewski\\Openiai\\Structure\\ApiGates\\v' . $version . '\\' . $gateName . '\\' . ucfirst($methodName);

        return class_exists($gate_name)
            ? $gateName
            : null;
    }
}
