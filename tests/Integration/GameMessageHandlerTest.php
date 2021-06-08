<?php

namespace App\Tests\Integration;

use App\DataTransferObject\CalculationListDataProvider;
use App\DataTransferObject\MatchDataProvider;
use App\DataTransferObject\MatchListDataProvider;
use App\Messenger\GameMessageHandler;
use App\Service\Redis\RedisService;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GameMessageHandlerTest extends KernelTestCase
{
    private ?Connection $entityManager;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();

        $this->entityManager = self::$container
            ->get('doctrine.dbal.default_connection');

        $this->userList = self::$container->get(GameMessageHandler::class);
    }

    protected function tearDown(): void
    {
        $this->entityManager->executeStatement('DELETE FROM messenger_messages');

        //self::$container->get(RedisService::class)->deleteAll();

        $this->entityManager->close();
        $this->entityManager = null;

        parent::tearDown();
    }

    public function test()
    {
        $match = new MatchDataProvider();
        $match->setMatchId('hahahha2');

        $matchListDataProvider = new MatchListDataProvider();
        $matchListDataProvider->addData($match);

        $userList = $this->userList;
        $userList($matchListDataProvider);

        $message = $this->getMessageInfo();
    }

    private function getMessageInfo(): array
    {
        $sql = "SELECT * FROM messenger_messages";
        $stmt = $this->entityManager->prepare($sql);
        return $stmt->executeQuery()->fetchAllAssociative();
    }
}