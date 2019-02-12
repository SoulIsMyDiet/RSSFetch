<?php


namespace MarekDzilneRekrutacjaHRtec\Repo;


use MarekDzilneRekrutacjaHRtec\CsvFile;

/**
 * Interface Repository
 * @package MarekDzilneRekrutacjaHRtec\Repo
 */
interface Repository
{
    /**
     * @param CsvFile $csvFile
     * @return mixed
     */
    public function write(CsvFile $csvFile);

    /**
     * @param CsvFile $csvFile
     * @return mixed
     */
    public function append(CsvFile $csvFile);
}