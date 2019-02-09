<?php


namespace MarekDzilneRekrutacjaHRtec\Command\Handler;


use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\CsvFile;
use MarekDzilneRekrutacjaHRtec\Repo\CsvRepository;

class WriteToCsvCommandHandler
{
    /**
     * @var CsvRepository
     */
    private $csvRepository;

    /**
     * WriteToCsvCommandHandler constructor.
     */
    public function __construct(CsvRepository $csvRepository)
    {
        $this->csvRepository = $csvRepository;
    }

    public function __invoke(WriteToCsvCommand $writeToCsvCommand)
    {
        $csvFile = CsvFile::fromContentAndPath($writeToCsvCommand->getRssData(), $writeToCsvCommand->getPath());
        $this->csvRepository->save($csvFile);
    }
}