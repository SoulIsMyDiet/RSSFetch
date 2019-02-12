<?php


namespace MarekDzilneRekrutacjaHRtec\Command\Handler;


use MarekDzilneRekrutacjaHRtec\Command\AppendToCsvCommand;
use MarekDzilneRekrutacjaHRtec\CsvFile;
use MarekDzilneRekrutacjaHRtec\Repo\Repository;

/**
 * Class AppendToCsvCommandHandler
 * @package MarekDzilneRekrutacjaHRtec\Command\Handler
 */
class AppendToCsvCommandHandler
{
    /**
     * @var Repository
     */
    private $csvRepository;

    /**
     * WriteToCsvCommandHandler constructor.
     * @param Repository $csvRepository
     */
    public function __construct(Repository $csvRepository)
    {
        $this->csvRepository = $csvRepository;
    }

    /**
     * @param AppendToCsvCommand $appendToCsvCommand
     */
    public function __invoke(AppendToCsvCommand $appendToCsvCommand)
    {
        $csvFile = CsvFile::fromContentAndPath($appendToCsvCommand->getRssData(), $appendToCsvCommand->getPath());
        $this->csvRepository->append($csvFile);
    }
}