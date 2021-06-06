<?php
declare(strict_types=1);

namespace App\Repository;




use App\DataTransferObject\UserDataProvider;
use App\Repository\Mapper\UserMapper;

class UserWriteManager
{

    /**
     * @var \Doctrine\ORM\EntityManagerInterface $objectManager
     */
    private $objectManager;
    /**
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    /**
     * @var \App\Repository\Mapper\UserMapper
     */
    private $userMapper;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $objectManager, UserRepository $userRepository, UserMapper $userMapper){
        $this->userRepository = $userRepository;
        $this->objectManager = $objectManager;
        $this->userMapper = $userMapper;
    }

    /**
     * @param \App\DataTransferObject\GameDataProvider $gameDataProvider
     */
    public function save(UserDataProvider $userDataProvider):void

    {
        $userDataFromRepository = $this->userRepository->getOneByMatchId($userDataProvider->getMatchId());
        if($userDataFromRepository instanceof UserDataProvider){
            $userDataFromRepository->fromArray($userDataProvider->toArray());
            $this->objectManager->persist($this->userMapper->mapToGameEntity($userDataFromRepository));
        }else{
            $this->objectManager->persist($this->userMapper->mapToUserEntity($userDataProvider));
        }
        $this->objectManager->flush();
    }

    public function delete():void
    {

    }
}