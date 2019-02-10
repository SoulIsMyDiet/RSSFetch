<?php


namespace MarekDzilneRekrutacjaHRtec;


use SimpleXMLElement;
include_once 'config.php';
class RssData
{
    private $site;
    //private $columns;

    /**
     * RssData constructor.
     */
    public function __construct($site)
    {
        $this->site = $site;
        //$this->columns = $columns;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

//    /**
//     * @return mixed
//     */
//    public function getColumns()
//    {
//        return $this->columns;
//    }

    public function fetchRssData(){
    $content = file_get_contents($this->site);
$doc = new SimpleXmlElement($content);
$rows = array();
foreach($doc->channel->item as $item)
{
    $dc = $item->children("http://purl.org/dc/elements/1.1/");
    $rows[] = array_merge((array)$item, (array)$dc);
}
$this->filterData($rows, $this);
        return $rows;

    }

    private function filterData(&$rows){
        foreach ($rows as &$row) {
            $row['description'] = strip_tags($row['description']);
            $row['pubDate'] = strtotime($row['pubDate']);
            $arrLocales = array('pl_PL', 'pl','Polish_Poland.28592', 'pl_PL.utf-8', 'pl_PL.ISO8859-2', 'polish_pol');
            setlocale( LC_ALL, $arrLocales );
            $row['pubDate'] =  strftime('%d %B %Y %X', $row['pubDate']);
           $row = array_filter($row, function ($var) {
return in_array($var, COLUMNS);
            }, ARRAY_FILTER_USE_KEY);

            }
    }

}