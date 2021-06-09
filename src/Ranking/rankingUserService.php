<?php


namespace App\Ranking;


use App\DataTransferObject\RankingListDataProvider;

class rankingUserService
{

    private $calculateScore;

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


    private function quick_sort($my_array)
    {
        $loe = $gt = array();
        if (count($my_array) < 2) {
            return $my_array;
        }
        $pivot_key = key($my_array);
        $pivot = array_shift($my_array);
        foreach ($my_array as $val) {
            if ($val <= $pivot) {
                $loe[] = $val;
            } elseif ($val > $pivot) {
                $gt[] = $val;
            }
        }
        return array_merge(quick_sort($loe), array($pivot_key => $pivot), quick_sort($gt));
    }
}
}