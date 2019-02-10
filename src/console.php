<?php


namespace MarekDzilneRekrutacjaHRtec;

use MarekDzilneRekrutacjaHRtec\Controller\CsvController;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskRepository;

include_once 'config.php';
require_once __DIR__ . '/../vendor/autoload.php';

if (!isset($argv[1])) {
    echo 'nie wybrano komendy!';
    exit;
}

$path = substr(PATH, -4, 4) === '.csv' ? PATH : PATH . '.csv';


$repo = new OnDiskRepository();
$controller = new CsvController($repo);
switch ($argv[1]) {
    case 'csv:simple':
        if (isset($argv[2])) {
            $controller->writeRssDataToCsv($argv[2], $path);
        } else {
            echo 'nie wybrano URL!';
        }
        break;
    case 'csv:extended':
        if (isset($argv[2])) {
            $controller->appendRssDataToCsv($argv[2], $path);
        } else {
            echo 'nie wybrano URL!';
        }
        break;
    default:
        echo 'Podano nieprawidłową komende!';
}
