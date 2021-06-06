<?php
declare(strict_types=1);
namespace App\Repository;

use App\DataTransferObject\GameDataProvider;

interface GameWriteManagerInterface
{
    /**
     * @param \App\DataTransferObject\GameDataProvider $gameDataProvider
     */
    public function save(GameDataProvider $gameDataProvider): void;

    /**
     *
     */
    public function delete(): void;
}