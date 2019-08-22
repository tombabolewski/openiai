<?php


namespace Tombabolewski\Openiai;


class ResultPage
{
    protected $page;
    protected $collection;

    public function __construct($body)
    {
        //todo set page
        return $collection = collect(json_decode($body));
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }
}