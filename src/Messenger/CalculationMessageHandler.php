<?php


namespace App\Messenger;


use App\DataTransferObject\CalculationListDataProvider;
use App\Ranking\CalculateScore;
use App\Service\Redis\RedisRepository;
use App\Service\Redis\RedisService;
use Symfony\Component\Messenger\MessageBusInterface;

class CalculationMessageHandler
{
    private RedisRepository $redisRepository;

    private RedisService $redisService;

    private CalculateScore $calculateScore;

    private MessageBusInterface $messageBus;

    /**
     * GameMessageHandler constructor.
     * @param \App\Service\Redis\RedisService $redisService
     * @param \Symfony\Component\Messenger\MessageBusInterface $messageBus
     */
    public function __construct(RedisService $redisService, MessageBusInterface $messageBus, CalculateScore $calculateScore)
    {
        $this->redisService = $redisService;
        $this->messageBus = $messageBus;
        $this->calculateScore = $calculateScore;
    }

    public function __invoke(CalculationListDataProvider $calculationListDataProvider)
    {
        $this->calculateScore->calculateScoreList(new CalculationListDataProvider());
        $this->redisService->set('test1', json_encode($calculationListDataProvider->toArray()));

        $info = $this->redisService->get('test1');

        $test = new TestDataProvider();
        $test->setIdent(1);
        $test->setName($info);

        $this->messageBus->dispatch($test);
        //$this->redisRepository->saveGames($matchListDataProvider);
        //$this->userList->calculate();


    }

}