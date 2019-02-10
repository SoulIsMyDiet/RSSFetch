<?php


namespace MarekDzilneRekrutacjaHRtec\Controller;


use MarekDzilneRekrutacjaHRtec\Command\AppendToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Command\Handler\AppendToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Repo\Repository;
use MarekDzilneRekrutacjaHRtec\Command\Handler\WriteToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\RssData;
use Prooph\ServiceBus\CommandBus;
use Prooph\ServiceBus\Plugin\Router\CommandRouter;



class CsvController
{
    /**
     * @var Repository
     */
    private $csvRepository;
    private $commandBus;
    private $commandRouter;

    /**
     *
     * CsvController constructor.
     */
    public function __construct(Repository $csvRepository)
    {

        $this->commandBus = new CommandBus();
        $this->commandRouter = new CommandRouter();

        $this->csvRepository = $csvRepository;
    }

    public function writeRssDataToCsv($site, $path){
    $rssData = new RssData($site);
    $fetchedData = $rssData->fetchRssData();
        $this->commandRouter->attachToMessageBus($this->commandBus);
        $this->commandRouter
            ->route(WriteToCsvCommand::class)
            ->to(new WriteToCsvCommandHandler($this->csvRepository));
        $this->commandBus->dispatch(new WriteToCsvCommand($fetchedData, $path));

    }

    public function appendRssDataToCsv($site, $path){
        $rssData = new RssData($site);
        $fetchedData = $rssData->fetchRssData();
        $this->commandRouter->attachToMessageBus($this->commandBus);
        $this->commandRouter
            ->route(AppendToCsvCommand::class)
            ->to(new AppendToCsvCommandHandler($this->csvRepository));
        $this->commandBus->dispatch(new AppendToCsvCommand($fetchedData, $path));

    }

}