<?php


namespace MarekDzilneRekrutacjaHRtec\Repo;


use MarekDzilneRekrutacjaHRtec\CsvFile;

interface CsvRepository
{
    public function save(CsvFile $csvFile);
}