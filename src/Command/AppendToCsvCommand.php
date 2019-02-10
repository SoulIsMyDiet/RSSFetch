<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


class AppendToCsvCommand
{

    private $rssData;
    private $path;

    /**
     * AppendToCsvCommand constructor.
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