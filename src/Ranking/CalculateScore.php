<?php
declare(strict_types=1);

namespace App\Ranking;


use App\DataTransferObject\CalculationDataProvider;
use App\DataTransferObject\CalculationListDataProvider;
use App\DataTransferObject\RankingDataProvider;
use App\DataTransferObject\RankingListDataProvider;
use App\DataTransferObject\UserDataProvider;
use App\DataTransferObject\UserListDataProvider;
use App\Service\Redis\RedisRepository;

class CalculateScore
{
    private RedisRepository $redisRepository;

    public function __construct(RedisRepository $redisRepository){
        $this->redisRepository = $redisRepository;
    }

    public function calculateScoreList():RankingListDataProvider
    {
        $unsortedRankingList = new RankingListDataProvider();
        $userDataProviderList = $this->redisRepository->getUsers();
        foreach ($userDataProviderList as $user){
            $singleRanking = new RankingDataProvider();
            $singleRanking->setUser($user->getName());

            $calculationListDataProvider = $this->redisRepository->getCalculationPerUser($user->getName());
            foreach ($calculationListDataProvider as $calculation){
                $singleRanking->setScoreSum($singleRanking->getScoreSum()+$calculation->getScore());
            }
            $singleRanking->setTips($calculationListDataProvider);
            $unsortedRankingList->addData($singleRanking);
        }
        return $unsortedRankingList;
    }

}