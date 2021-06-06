<?php

declare(strict_types=1);

namespace App\Service\Import\Helper;


use App\DataTransferObject\GameDataProvider;
use App\DataTransferObject\TipDataProvider;
use App\DataTransferObject\UserDataProvider;
use App\Entity\Tip;

class ImportMapper implements ImportMapperInterface
{
    public function mapToUserDataProvider(array $inputJson):UserDataProvider
    {
        $userDataProvider = new UserDataProvider();
        $userDataProvider->setName($inputJson['name']);
        $userDataProvider->setPosition($inputJson['position']);
        $userDataProvider->setScoreSum($inputJson['scoreSum']);

        $tipList = [];
        foreach ($inputJson['tips'] as $singleTip){
            $tipList [] = $this->makeTip($singleTip);
    }
        $userDataProvider->setTips($tipList);

        return $userDataProvider;

    }

    public function mapToGameDataProvider(array $inputJson):GameDataProvider
    {
        $gameDataProvider = new GameDataProvider();
        $gameDataProvider->setMatchDatetime($inputJson['matchDatetime']);
        $gameDataProvider->setTeam1($inputJson['team1']);
        $gameDataProvider->setTeam2($inputJson['team2']);
        $gameDataProvider->setScoreTeam1($inputJson['scoreTeam1']);
        $gameDataProvider->setScoreTeam2($inputJson['scoreTeam2']);
        return $gameDataProvider;
    }

    private function makeTip(array $singleTip):TipDataProvider
    {
        $tip = new TipDataProvider();
        $tip->fromArray($singleTip);

        return $tip;
    }
}