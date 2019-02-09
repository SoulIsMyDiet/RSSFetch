<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


use MarekDzilneRekrutacjaHRtec\RssData;

class WriteToCsvCommand
{
    /**
     * @var RssData
     */
    private $rssData;
    private $path;

    /**
     * WriteToCsvCommand constructor.
     */
    public function __construct(RssData $rssData, $path)
    {

        $this->rssData = $rssData;
        $this->path = $path;
    }

    /**
     * @return RssData
     */
    public function getRssData(): RssData
    {
        return $this->rssData;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

}