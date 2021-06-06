<?php

namespace App\Frontend\Business;

use App\DataTransferObject\UserDataProvider;

interface RankingListBusinessFacadeInterface
{
    /**
     * @return \App\DataTransferObject\UserDataProvider []
     */
    public function getRankingList(): array;

    /**
     * @return \App\DataTransferObject\UserDataProvider|null
     */
    public function getWinnerOfTheDay(): ?UserDataProvider;
}