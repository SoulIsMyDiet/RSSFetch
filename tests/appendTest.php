<?php

namespace MarekDzilneRekrutacjaHRtec;

include_once __DIR__.'/../src/config.php';


use MarekDzilneRekrutacjaHRtec\Command\AppendToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Command\Handler\AppendToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskRepository;
use PHPUnit\Framework\TestCase;

class appendTest extends TestCase
{

    public function testAppendingOption()
    {
        $repository = new OnDiskRepository();
        $rssData = new RssData('http://feeds.nationalgeographic.com/ng/News/News_Main');
        $fetchedData = $rssData->fetchRssData();
        $handler = new AppendToCsvCommandHandler($repository);
        $handler(new AppendToCsvCommand($fetchedData, 'appendTest'));

        $this->assertFileExists('appendTest');
    }

}