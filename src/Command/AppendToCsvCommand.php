<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


class AppendToCsvCommand
{

    private $rssData;
    private $path;

    /**
     * AppendToCsvCommand constructor.
     * @param array $rssData
     * @param $path
     */
    public function __construct(array $rssData, $path)
    {

        $this->rssData = $rssData;
        $this->path = $path;
    }


    /**
     * @return array
     */
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