<?php
declare(strict_types=1);

namespace App\Repository\Mapper;


use App\DataTransferObject\GameDataProvider;
use App\Entity\Game;

class GameMapper implements GameMapperInterface
{

    public function mapToGameDataProvider(Game $user):GameDataProvider
    {
        $gameDataProvider = new GameDataProvider();

        return $gameDataProvider;
    }

    public function mapToGameEntity(GameDataProvider $gameDataProvider):Game
    {
        $game = new Game();
        return $game;
    }
}