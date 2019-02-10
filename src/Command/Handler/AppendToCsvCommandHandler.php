<?php


namespace MarekDzilneRekrutacjaHRtec\Command\Handler;


use MarekDzilneRekrutacjaHRtec\Command\AppendToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\CsvFile;
use MarekDzilneRekrutacjaHRtec\Repo\Repository;

class AppendToCsvCommandHandler
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

    public function __invoke(AppendToCsvCommand $writeToCsvCommand)
    {
        $csvFile = CsvFile::fromContentAndPath($writeToCsvCommand->getRssData(), $writeToCsvCommand->getPath());
        $this->csvRepository->append($csvFile);
    }
}