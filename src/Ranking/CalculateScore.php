<?php


namespace App\Ranking;


use App\DataTransferObject\CalculationDataProvider;
use App\DataTransferObject\CalculationListDataProvider;
use App\DataTransferObject\RankingDataProvider;
use App\DataTransferObject\RankingListDataProvider;
use App\DataTransferObject\UserDataProvider;
use App\DataTransferObject\UserListDataProvider;

class CalculateScore
{
    public function __construct(){

    }
    public function calculateScoreList():RankingListDataProvider
    {
        $unsortedRankingList = new RankingListDataProvider();
        //getUserList from Redice
        foreach ($userDataProviderList as $user){
            $singleRanking = new RankingDataProvider();
            $singleRanking->setUser($user->getName());

            //getcalculationList of specific user
            foreach ($calculationListDataProvider as $calculation){
                $singleRanking->setScoreSum($singleRanking->getScoreSum()+$calculation->getScore());
            }
            $singleRanking->setTips($calculationListDataProvider);
            $unsortedRankingList->addData($singleRanking);
        }
        return $unsortedRankingList;
    }

}