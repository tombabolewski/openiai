<?php


namespace Tombabolewski\Openiai\Structure;


class ApiMethod
{
    protected $name;
    protected $params;

    protected $paramsStructure;
    protected $apiResponse;
    protected $availableMethods;


    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * @param $page
     * @param $params
     */
    public function exec($params, $page = 0)
    {
        //todo: validate params
        //todo: make request via http client
        //todo: build page body and create page obj
        //todo: return ApiResponse
        $this->params = $params;
        $this->validate();
        $this->request($page);
    }

    public function validate()
    {
        
    }

    public function request($page)
    {
        
    }

    /**
     * @param mixed $availableMethods
     *
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