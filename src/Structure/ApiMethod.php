<?php


namespace Tombabolewski\Openiai\Structure;


abstract class ApiMethod
{
    protected $name;
    protected $paramsStructure;
    protected $apiResponse;

    public function __construct()
    {
    }

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

}
