<?php


namespace MarekDzilneRekrutacjaHRtec;
use MarekDzilneRekrutacjaHRtec\Controller\CsvController;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskRepository;
use SimpleXMLElement;

include_once 'config.php';
require_once __DIR__ . '/../vendor/autoload.php';

if(!isset($argv[1])){
    echo 'nie wybrano komendy!';
    exit;
}

$site = "http://feeds.nationalgeographic.com/ng/News/News_Main";



$repo = new OnDiskRepository();
$controller = new CsvController($repo);
    switch ($argv[1]){
        case 'csv:simple':
            if(isset($argv[2])) {
                $controller->writeRssDataToCsv($argv[2], PATH);
            }else {
                echo 'nie wybrano URL!';
            }
            break;
        case 'csv:extended':
            if(isset($argv[2])) {
                $controller->appendRssDataToCsv($argv[2], PATH);
            }else {
                echo 'nie wybrano URL!';
            }
            break;
        default:
            echo 'Podano nieprawidłową komende!';
    }

//$controller->writeRssDataToCsv($site, PATH);
//$controller->appendRssDataToCsv($site, PATH);
