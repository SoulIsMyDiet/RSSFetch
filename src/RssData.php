<?php


namespace MarekDzilneRekrutacjaHRtec;


class RssData
{
    private $site;

    /**
     * RssData constructor.
     */
    public function __construct($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

}