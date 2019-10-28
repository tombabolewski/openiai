<?php


namespace Tombabolewski\Openiai\Response;


class ResultPage
{
    protected $page;
    protected $collection;

    /**
     * ResultPage constructor.
     * @param $body
     */
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

    /**
     * @param mixed $page
     * @return ResultPage
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }
}