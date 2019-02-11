<?php


namespace MarekDzilneRekrutacjaHRtec\Repo;

include_once __DIR__ . '/../config.php';

use MarekDzilneRekrutacjaHRtec\CsvFile;

class OnDiskRepository implements Repository
{
    /**
     * Write data to chosen file
     *
     * @param CsvFile $csvFile
     */
    public function write(CsvFile $csvFile)
    {
        $file = fopen($csvFile->getPath(), 'w');
        fputcsv($file, COLUMNS);
        foreach ($csvFile->getContents() as $content) {
            fputcsv($file, $content);
        }
        fclose($file);

    }

    /**
     * Append data to chosen file
     *
     * @param CsvFile $csvFile
     */
    public function append(CsvFile $csvFile)
    {
        $file = fopen($csvFile->getPath(), 'a');
        fputcsv($file, COLUMNS);
        foreach ($csvFile->getContents() as $content) {
            fputcsv($file, $content);
        }
        fclose($file);
        file_put_contents($csvFile->getPath(), array_unique(file($csvFile->getPath())));

    }
}