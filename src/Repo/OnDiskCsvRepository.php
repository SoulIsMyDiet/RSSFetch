<?php


namespace MarekDzilneRekrutacjaHRtec\Repo;


//use MarekDzilneRekrutacjaHRtec\Repo\CsvRepository;
use MarekDzilneRekrutacjaHRtec\CsvFile;

class OnDiskCsvRepository implements CsvRepository
{
public function save(CsvFile $csvFile){
    $file = fopen('testtest', 'a');
    fputcsv($file, array('title', 'link'));
    //fputcsv($file, array($title, $link));
    fputcsv($file, array('kolejny title', 'kolejny link'));
    fclose($file);

}
}