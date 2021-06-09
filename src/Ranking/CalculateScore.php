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

    public function calculateScoreList(CalculationListDataProvider $calculationListDataProvider):RankingListDataProvider
    {
        $unsortedRankingList = new RankingListDataProvider();
        $userDataProviderList = $this->getUserFromList($calculationListDataProvider->toArray());
        foreach ($userDataProviderList as $user){
            $singleRanking = new RankingDataProvider();
            $singleRanking->setUser($user->getName());

            $calculationListDataProvider = new CalculationListDataProvider();
            $calculationListDataProvider->fromArray($this->partCalculationListInUserSection($calculationListDataProvider->toArray(),$user));
            foreach ($calculationListDataProvider as $calculation){
                $singleRanking->setScoreSum($singleRanking->getScoreSum()+$calculation->getScore());
            }
            $singleRanking->setTips($calculationListDataProvider);
            $unsortedRankingList->addData($singleRanking);
        }
        return $unsortedRankingList;
    }

    private function getUserFromList(array $calculationList): array
    {
        $userList = [];
        foreach ($calculationList as $entry){
            if(!in_array($entry['user'], $userList, true)){
                $userList[] = $entry ['user'];
            }
        }
        return $userList;
    }

    private function partCalculationListInUserSection(array $calculationList, String $username):array{
        $result = [];
        foreach ($calculationList as $calculation){
            if($calculation['user'] === $username){
                $result [] = $calculation;
            }
        }
        return $result;
    }

}