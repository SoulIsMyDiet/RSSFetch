<?php


namespace MarekDzilneRekrutacjaHRtec;


//use Exception;
use Mockery\Exception;
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

    public function fetchRssData(){
        try {
            $content = @file_get_contents($this->site);
        if($content == false){
            throw new Exception('Nie poprawny format danych!');
        };
        //try {
            libxml_use_internal_errors(true);
            $doc = new SimpleXmlElement($content);
        }catch(Exception $e){
            libxml_clear_errors();
            echo $e->getMessage();
            throw $e;
        }
        $rows = array();
foreach($doc->channel->item as $item)
{
    $dc = $item->children("http://purl.org/dc/elements/1.1/");
    $rows[] = array_merge((array)$item, (array)$dc);
}
$this->filterData($rows);
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