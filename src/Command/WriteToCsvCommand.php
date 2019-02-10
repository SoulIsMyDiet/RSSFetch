<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


class WriteToCsvCommand
{

    private $rssData;
    private $path;

    /**
     * WriteToCsvCommand constructor.
     */
    public function __construct(array $rssData, $path)
    {

        $this->rssData = $rssData;
        $this->path = $path;
    }


    public function getRssData()
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