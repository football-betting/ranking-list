<?php
declare(strict_types=1);

namespace App\Ranking;


use App\DataTransferObject\CalculationListDataProvider;
use App\DataTransferObject\RankingListDataProvider;
use function Pipeline\fromArray;

class RankingUserService
{
    /**
     * @var \App\Ranking\CalculateScore $calculateScore
     */
    private CalculateScore $calculateScore;

    public function __construct(CalculateScore $calculateScore, )
    {
        $this->calculateScore = $calculateScore;
    }

    public function createRankingList(CalculationListDataProvider $calculationListDataProvider): RankingListDataProvider
    {
        $unsortedRankingList = $this->calculateScore->calculateScoreList($calculationListDataProvider);
        $position = 1;
        $jumper = 0;

        $sortedRankingList = $unsortedRankingList->toArray();
        usort( $sortedRankingList, function ($a, $b) {
            return ($a->getScoreSum() <=> $b->getScoreSum()) * -1;
        });


        foreach ($sortedRankingList as $key => $rank) {
            if ($key + 1 < count($unsortedRankingList->getData())) {
                if ($rank[$key]->getScoreSume() > $rank[$key + 1]->getScoreSum()) {
                    $rank[$key]->setPosition($position);
                    $position += $jumper +1 ;
                    $jumper = 0;
                } else {
                    $rank[$key]->setPosition($position);
                    $jumper++;
                }
            } else {
                $rank[$key]->setPosition($position);
            }
        }
        $finalRanking = new RankingListDataProvider();
        $finalRanking->fromArray($sortedRankingList);

        return $finalRanking;
    }


}