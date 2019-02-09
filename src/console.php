<?php


namespace MarekDzilneRekrutacjaHRtec;
use MarekDzilneRekrutacjaHRtec\Controller\CsvController;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskCsvRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$site = "http://feeds.nationalgeographic.com/ng/News/News_Main";
//$content = file_get_contents($site);
//$doc = new SimpleXmlElement($content);

//foreach($doc->channel->item as $item)
//{
//    $link = $item->link;
//    $title = $item->title;
//}
//echo $title;
//$file = fopen('test', 'a');
//fputcsv($file, array('title', 'link'));
//fputcsv($file, array($title, $link));
//fputcsv($file, array('kolejny title', 'kolejny link'));
//fclose($file);
$repo = new OnDiskCsvRepository();
$controller = new CsvController($repo);
$controller->writeRssDataToCsv($site, 'nowytest');
