<?php


namespace App\Tests\Integration;


use App\DataTransferObject\CalculationListDataProvider;
use App\Ranking\CalculateScore;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculateScoreTest extends KernelTestCase
{
    private ?object $calculateScore;

    private ?Connection $entityManager;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();

        $this->entityManager = self::$container
            ->get('doctrine.dbal.default_connection');

        $this->calculateScore = self::$container->get(CalculateScore::class);

    }

    protected function tearDown(): void
    {
        $this->entityManager->executeStatement('DELETE FROM messenger_messages');

        //self::$container->get(RedisService::class)->deleteAll();

        $this->entityManager->close();
        $this->entityManager = null;

        parent::tearDown();
    }

    public function testScoreSum():void{
        $calculationList = new CalculationListDataProvider();
        $calculationList->fromArray(json_decode($this->getJSON(), true));
        $this->calculateScore->calculateScoreList($calculationList);
        self::assertTrue(false);

    }

    private function getJSON():string
    {
        //$string = file_get_contents(__DIR__.'/../Fixtures/testData.json');
        return file_get_contents(__DIR__.'/../Fixtures/CalculationtestData.json');
    }
}