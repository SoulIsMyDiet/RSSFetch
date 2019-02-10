<?php


namespace MarekDzilneRekrutacjaHRtec\Repo;


use MarekDzilneRekrutacjaHRtec\CsvFile;

interface Repository
{
    public function write(CsvFile $csvFile);

    public function append(CsvFile $csvFile);
}