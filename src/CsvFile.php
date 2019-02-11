<?php


namespace MarekDzilneRekrutacjaHRtec;


class CsvFile
{
    private $content;
    private $path;

    /**
     * CsvFile constructor.
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
     * @param $content
     * @param $path
     * @return CsvFile
     */
    public static function fromContentAndPath($content, $path)
    {
        return new self($content, $path);
    }


}