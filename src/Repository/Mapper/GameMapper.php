<?php
declare(strict_types=1);

namespace App\Repository\Mapper;


use App\DataTransferObject\GameDataProvider;
use App\Entity\Game;

class GameMapper implements GameMapperInterface
{
    /**
     * @param \App\Entity\Game $game
     * @return \App\DataTransferObject\GameDataProvider
     */
    public function mapToGameDataProvider(Game $game): GameDataProvider
    {
        $gameDataProvider = new GameDataProvider();
        $gameDataProvider->setIdent($game->getId());
        $gameDataProvider->setMatchDatetime($game->getMatchDatetime());
        $gameDataProvider->setTeam1($game->getTeam1());
        $gameDataProvider->setTeam2($game->getTeam2());
        $gameDataProvider->setScoreTeam1($game->getScoreTeam1());
        $gameDataProvider->setScoreTeam2($game->getScoreTeam2());
        return $gameDataProvider;
    }

    /**
     * @param \App\DataTransferObject\GameDataProvider $gameDataProvider
     * @return \App\Entity\Game
     */
    public function mapToGameEntity(GameDataProvider $gameDataProvider): Game
    {
        $game = new Game();
        $game->setId($gameDataProvider->getIdent());
        $game->setMatchDatetime($gameDataProvider->getMatchDatetime());
        $game->setTeam1($gameDataProvider->getTeam1());
        $game->setTeam2($gameDataProvider->getTeam2());
        $gameDataProvider->setScoreTeam1($gameDataProvider->getScoreTeam1());
        $gameDataProvider->setScoreTeam2($gameDataProvider->getScoreTeam2());
        return $game;
    }
}