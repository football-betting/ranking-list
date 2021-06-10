<?php


namespace App\Messenger;


use App\DataTransferObject\CalculationListDataProvider;
use App\DataTransferObject\MatchListDataProvider;
use App\DataTransferObject\RankingTransportListDataProvider;
use App\Ranking\CalculateScore;
use App\Ranking\RankingUserService;
use App\Service\Redis\RedisRepository;
use App\Service\Redis\RedisService;
use Nette\Utils\JsonException;
use Symfony\Component\Messenger\MessageBusInterface;

class CalculationMessageHandler
{
    private RedisRepository $redisRepository;

    private RedisService $redisService;

    /**
     * @var \App\Ranking\RankingUserService $rankingUserService
     */
    private RankingUserService $rankingUserService;

    private MessageBusInterface $messageBus;

    /**
     * GameMessageHandler constructor.
     * @param \App\Service\Redis\RedisService $redisService
     * @param \Symfony\Component\Messenger\MessageBusInterface $messageBus
     */
    public function __construct(RedisService $redisService, MessageBusInterface $messageBus, RankingUserService $rankingUserService)
    {
        $this->redisService = $redisService;
        $this->messageBus = $messageBus;
        $this->rankingUserService = $rankingUserService;
    }


    public function __invoke(CalculationListDataProvider $calculationListDataProvider)
    {
        $games = new MatchListDataProvider();
        $rankingTransportList = new RankingTransportListDataProvider();
        $rankingList = $this->rankingUserService->createRankingList($calculationListDataProvider);

        try{
            $games->fromArray(json_decode($this->redisService->get('games'), true, 512, JSON_THROW_ON_ERROR));

        }catch (\JsonException $e){

        }

        $rankingTransportList->setGames($games);
        $rankingTransportList->setRankings($rankingList);
        $this->messageBus->dispatch($rankingList);
    }

}