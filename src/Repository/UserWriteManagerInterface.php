<?php
declare(strict_types=1);
namespace App\Repository;

use App\DataTransferObject\UserDataProvider;

interface UserWriteManagerInterface
{
    /**
     * @param \App\DataTransferObject\GameDataProvider $gameDataProvider
     */
    public function save(UserDataProvider $userDataProvider): void;

    public function delete(): void;
}