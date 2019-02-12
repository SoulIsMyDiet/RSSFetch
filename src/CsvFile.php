<?php


namespace MarekDzilneRekrutacjaHRtec;


/**
 * Class CsvFile
 * @package MarekDzilneRekrutacjaHRtec
 */
class CsvFile
{
    /**
     * @var array
     */
    private $content;
    /**
     * @var string
     */
    private $path;

    /**
     * CsvFile constructor.
     * @param $content
     * @param $path
     */
    public function __construct($content, $path)
    {
        $this->content = $content;
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $content array
     * @param $path string
     * @return CsvFile
     */
    public static function fromContentAndPath($content, $path)
    {
        return new self($content, $path);
    }


}