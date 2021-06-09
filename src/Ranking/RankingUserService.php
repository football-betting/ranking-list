<?php
declare(strict_types=1);

namespace App\Ranking;


use App\DataTransferObject\RankingListDataProvider;

class rankingUserService
{
    /**
     * @var \App\Ranking\CalculateScore $calculateScore
     */
    private CalculateScore $calculateScore;

    public function __construct(CalculateScore $calculateScore)
    {
        $this->calculateScore = $calculateScore;
    }

    public function createRankingList(): RankingListDataProvider
    {
        $unsortedRankingList = $this->calculateScore->calculateScoreList();
        $position = 1;
        $jumper = 0;
        $sortedRankingList = new RankingListDataProvider();
        $sortedRankingList->fromArray($this->quick_sort($unsortedRankingList->toArray()));
        foreach ($unsortedRankingList->getData() as $key => $rank) {
            if ($key + 1 < count($unsortedRankingList->getData())) {
                if ($rank[$key]->getScoreSume() > $rank[$key + 1]->getScoreSum()) {
                    $rank[$key]->setPosition($position);
                    $position += $jumper;
                    $jumper = 0;
                } else {
                    $rank[$key]->setPosition($position);
                    $jumper++;
                }
            } else {
                $rank[$key]->setPosition($position);
            }
        }
        return $sortedRankingList;
    }


    private function quick_sort(Array $arrayRankingList)
    {
        $loe = $gt = array();
        if (count($arrayRankingList) < 2) {
            return $arrayRankingList;
        }
        $pivot_key = key($arrayRankingList);
        $pivot = array_shift($arrayRankingList);
        foreach ($arrayRankingList as $arrayRankingEntry) {
            if ($arrayRankingEntry['scoreSum'] <= $pivot['scoreSum']) {
                $loe[] = $arrayRankingEntry;
            } elseif ($arrayRankingEntry['scoreSum'] > $pivot['scoreSum']) {
                $gt[] = $arrayRankingEntry;
            }
        }
        return array_merge($this->quick_sort($loe), array($pivot_key => $pivot), $this->quick_sort($gt));
    }
}