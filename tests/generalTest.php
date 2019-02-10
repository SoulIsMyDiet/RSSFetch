<?php
/**
 * Created by PhpStorm.
 * User: anzelm
 * Date: 10.02.19
 * Time: 13:27
 */

namespace MarekDzilneRekrutacjaHRtec;


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

        $this->expectExceptionMessage('Nie poprawny format danych!');

        $rssData = new RssData('nie istniejaca strona');

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