<?php
declare(strict_types=1);

namespace App\Messenger;

use App\DataTransferObject\MatchListDataProvider;
use App\DataTransferObject\TestDataProvider;
use App\Service\Redis\RedisRepository;
use App\Service\Redis\RedisService;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

class GameMessageHandler
{
    private RedisRepository $redisRepository;

    private RedisService $redisService;

    private MessageBusInterface $messageBus;

    /**
     * GameMessageHandler constructor.
     * @param \App\Service\Redis\RedisService $redisService
     * @param \Symfony\Component\Messenger\MessageBusInterface $messageBus
     */
    public function __construct(RedisService $redisService, MessageBusInterface $messageBus)
    {
        $this->redisService = $redisService;
        $this->messageBus = $messageBus;
    }


    public function __invoke(MatchListDataProvider $matchListDataProvider)
    {

        $this->redisService->set('test1', json_encode($matchListDataProvider->toArray()));

        $info = $this->redisService->get('test1');

        $test = new TestDataProvider();
        $test->setIdent(1);
        $test->setName($info);

        $this->messageBus->dispatch($test);
        //$this->redisRepository->saveGames($matchListDataProvider);
        //$this->userList->calculate();


    }
}