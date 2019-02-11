<?php


namespace MarekDzilneRekrutacjaHRtec;


use Exception;
use SimpleXMLElement;

include_once 'config.php';

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

    /**
     * @return array
     * @throws Exception
     */
    public function fetchRssData()
    {
        $content = file_get_contents($this->site);
        if ($content == false) {
            throw new Exception('Nie poprawny format danych!');
        };
        libxml_use_internal_errors(true);
        $doc = new SimpleXmlElement($content);

        $rows = array();
        foreach ($doc->channel->item as $item) {
            $dc = $item->children("http://purl.org/dc/elements/1.1/");
            $rows[] = array_merge((array)$item, (array)$dc);
        }
        $this->filterData($rows);
        return $rows;

    }

    /**
     * Removing html tags from description column, converting data format, setting needed columns
     *
     * @param $rows
     */
    private function filterData(&$rows)
    {
        foreach ($rows as &$row) {
            $row['description'] = strip_tags($row['description']);
            $row['pubDate'] = strtotime($row['pubDate']);
            $arrLocales = array('pl_PL', 'pl', 'Polish_Poland.28592', 'pl_PL.utf-8', 'pl_PL.ISO8859-2', 'polish_pol');
            setlocale(LC_ALL, $arrLocales);
            $row['pubDate'] = strftime('%d %B %Y %X', $row['pubDate']);
            $row = array_filter($row, function ($var) {
                return in_array($var, COLUMNS);
            }, ARRAY_FILTER_USE_KEY);

        }
    }

}