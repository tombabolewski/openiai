<?php


namespace Tombabolewski\Openiai\Structure;


class ApiMethod
{
    protected $name;
    protected $paramsStructure;
    protected $apiResponse;
    protected $availableMethods;

    /**
     * @param $page
     * @param $params
     */
    public function exec($page, $params){
        //todo: validate params
        //todo: make request via http client
        //todo: build page body and create page obj
        //todo: return page
    }

    /**
     * @param mixed $availableMethods
     * @return ApiMethod
     */
    public function setAvailableMethods($availableMethods)
    {
        $this->availableMethods = $availableMethods;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableMethods()
    {
        return $this->availableMethods;
    }
}