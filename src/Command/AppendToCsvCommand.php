<?php


namespace MarekDzilneRekrutacjaHRtec\Command;


/**
 * Class AppendToCsvCommand
 * @package MarekDzilneRekrutacjaHRtec\Command
 */
class AppendToCsvCommand
{

    /**
     * @var array Our fetched and converted into array rss data
     */
    private $rssData;
    /**
     * @var string Path to our csv file
     */
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