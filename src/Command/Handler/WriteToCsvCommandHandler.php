<?php


namespace MarekDzilneRekrutacjaHRtec\Command\Handler;


use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\CsvFile;
use MarekDzilneRekrutacjaHRtec\Repo\Repository;

class WriteToCsvCommandHandler
{
    /**
     * @var Repository
     */
    private $csvRepository;

    /**
     * WriteToCsvCommandHandler constructor.
     */
    public function __construct(Repository $csvRepository)
    {
        $this->csvRepository = $csvRepository;
    }

    public function __invoke(WriteToCsvCommand $writeToCsvCommand)
    {
        $csvFile = CsvFile::fromContentAndPath($writeToCsvCommand->getRssData(), $writeToCsvCommand->getPath());
        $this->csvRepository->write($csvFile);
    }
}