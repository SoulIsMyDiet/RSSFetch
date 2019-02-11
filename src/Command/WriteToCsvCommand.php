<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


class WriteToCsvCommand
{

    private $rssData;
    private $path;

    /**
     * WriteToCsvCommand constructor.
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