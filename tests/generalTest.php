<?php


namespace MarekDzilneRekrutacjaHRtec;

include_once __DIR__.'/../src/config.php';

use MarekDzilneRekrutacjaHRtec\Command\AppendToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Command\Handler\AppendToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Command\Handler\WriteToCsvCommandHandler;
use MarekDzilneRekrutacjaHRtec\Command\WriteToCsvCommand;
use MarekDzilneRekrutacjaHRtec\Repo\OnDiskRepository;
use PHPUnit\Framework\TestCase;
class generalTest extends TestCase
{

    /**
     * @dataProvider getSite
     */
    public function testExceptionIfHtmlPage($site)
    {
        $this->expectExceptionMessage('String could not be parsed as XML');

        $rssData = new RssData($site);

        $rssData->fetchRssData();

    }

    public function getSite()
    {
        return [
            ['https://feedfury.com/'],
            ['https://www.google.com/'],
            ['https://www.wp.pl/']
        ];
    }

    public function testExceptionIfPageDoesNotExist()
    {

        $this->expectExceptionMessage('This is not correct URL form!');

        $rssData = new RssData('not existing site');

        $rssData->fetchRssData();

    }

    public function testIfAppendGivesMoreLinesThenWrite()
    {

        $firstArray = array(array('value1', 'value1'));
        $secondArray = array(array('value2', 'value2'));
        $repository = new OnDiskRepository();
        $appendHandler = new AppendToCsvCommandHandler($repository);
        $appendHandler(new AppendToCsvCommand($firstArray, 'appendToCompareTest'));
        $appendHandler(new AppendToCsvCommand($secondArray, 'appendToCompareTest'));

        $writeHandler = new WriteToCsvCommandHandler($repository);
        $writeHandler(new WriteToCsvCommand($firstArray, 'writeToCompareTest'));
        $writeHandler(new WriteToCsvCommand($secondArray, 'writeToCompareTest'));

        $this->assertGreaterThan(count(file('writeToCompareTest')), (count(file('appendToCompareTest'))));
    }
}