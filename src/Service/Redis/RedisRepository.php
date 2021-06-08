<?php


namespace App\Service\Redis;


use App\DataTransferObject\MatchListDataProvider;
use App\DataTransferObject\CalculationListDataProvider;

class RedisRepository
{
    private RedisService $redisService;

    private const GAMES = 'game';
    private const RANKING = 'ranking';

    /**
     * @param \App\Service\Redis\RedisService $redisService
     */
    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * @param string $username
     * @param \App\DataTransferObject\UserListDataProvider $calculationListDataProvider
     */
    public function saveRanking(string $username, CalculationListDataProvider $calculationListDataProvider): void
    {
        $this->redisService->set(self::RANKING, json_encode($calculationListDataProvider->toArray()));
    }

    /**
     * @param \App\DataTransferObject\MatchListDataProvider $matchListDataProvider
     */
    public function saveGames(MatchListDataProvider $matchListDataProvider): void
    {
        $this->redisService->set(self::GAMES, json_encode($matchListDataProvider->toArray()));
    }

    /**
     * @return \App\DataTransferObject\CalculationListDataProvider[]
     */
    public function getRankingList(): array
    {
        $keys = $this->redisService->getKeys(self::RANKING . '*');
        foreach ($keys as $id => $key) {
            $keys[$id] = str_replace($this->redisService->getPrefix(), '', $key);
        }
        $ranking =  $this->redisService->mget($keys);
        $ranking = array_filter($ranking);
        $rankingList = [];
        foreach ($ranking as $rankingItem) {
            $userListDataProvider = new CalculationListDataProvider();
            $userListDataProvider->fromArray(json_decode($rankingItem, true));

            $rankingList[] = $userListDataProvider;
        }

        return $rankingList;
    }

    /**
     * @return \App\DataTransferObject\MatchListDataProvider
     */
    public function getGames(): MatchListDataProvider
    {
        $games = $this->redisService->get(self::GAMES);

        $matchListDataProvider = new MatchListDataProvider();
        $matchListDataProvider->fromArray(json_decode($games, true));

        return $matchListDataProvider;
    }
}