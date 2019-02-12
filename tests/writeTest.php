<?php

namespace MarekDzilneRekrutacjaHRtec;

include_once __DIR__.'/../src/config.php';

use MarekDzilneRekrutacjaHRtec\Command\Handler\WriteToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskRepository;
use PHPUnit\Framework\TestCase;

class writeTest extends TestCase
{

    public function testWritingOption()
    {
        $repository = new OnDiskRepository();
        $rssData = new RssData('http://feeds.nationalgeographic.com/ng/News/News_Main');
        $fetchedData = $rssData->fetchRssData();
        $handler = new WriteToCsvCommandHandler($repository);
        $handler(new WriteToCsvCommand($fetchedData, 'writeTest'));

        $this->assertFileExists('writeTest');
    }

}