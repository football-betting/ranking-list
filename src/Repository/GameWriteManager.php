<?php

declare(strict_types=1);

namespace App\Repository;


use App\DataTransferObject\GameDataProvider;
use App\Repository\Mapper\GameMapper;

class GameWriteManager implements GameWriteManagerInterface
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface $objectManager
     */
    private $objectManager;
    /**
     * @var \App\Repository\GameRepository $gameRepository
     */
    private $gameRepository;

    /**
     * @var \App\Repository\Mapper\GameMapper $gameMapper
     */
    private $gameMapper;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $objectManager, GameRepository $gameRepository, GameMapper $gameMapper){
        $this->gameRepository = $gameRepository;
        $this->objectManager = $objectManager;
        $this->gameMapper = $gameMapper;
    }

    /**
     * @param \App\DataTransferObject\GameDataProvider $gameDataProvider
     */
    public function save(GameDataProvider $gameDataProvider):void
    {
        $gameDataFromRepository = $this->gameRepository->getOneByMatchId($gameDataProvider->getMatchId());
        if($gameDataFromRepository instanceof GameDataProvider){
            $gameDataFromRepository->fromArray($gameDataProvider->toArray());
            $this->objectManager->persist($this->gameMapper->mapToGameEntity($gameDataFromRepository));
        }else{
            $this->objectManager->persist($this->gameMapper->mapToGameEntity($gameDataProvider));
        }
        $this->objectManager->flush();
    }

    public function delete():void
    {

    }

}