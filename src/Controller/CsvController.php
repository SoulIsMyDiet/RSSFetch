<?php


namespace MarekDzilneRekrutacjaHRtec\Controller;


use MarekDzilneRekrutacjaHRtec\Repo\CsvRepository;
use MarekDzilneRekrutacjaHRtec\Command\Handler\WriteToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\RssData;
use Prooph\ServiceBus\CommandBus;
use Prooph\ServiceBus\Plugin\Router\CommandRouter;



class CsvController
{
    /**
     * @var CsvRepository
     */
    private $csvRepository;
    private $commandBus;
    private $commandRouter;

    /**
     *
     * CsvController constructor.
     */
    public function __construct(CsvRepository $csvRepository)
    {

        $this->commandBus = new CommandBus();
        $this->commandRouter = new CommandRouter();

        $this->csvRepository = $csvRepository;
    }

    public function writeRssDataToCsv($site, $path){
        //jakby nie dzialalo to zrobic jak Damian
    $rssData = new RssData($site);
        $this->commandRouter->attachToMessageBus($this->commandBus);
        $this->commandRouter
            ->route(WriteToCsvCommand::class)
            ->to(new WriteToCsvCommandHandler($this->csvRepository));
        $this->commandBus->dispatch(new WriteToCsvCommand($rssData, $path));

    }

}