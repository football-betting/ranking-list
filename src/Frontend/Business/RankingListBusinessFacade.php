<?php


namespace App\Frontend\Business;


use App\DataTransferObject\UserDataProvider;
use App\Repository\UserRepositoryInterface;

class RankingListBusinessFacade implements rankingListBusinessFacadeInterface
{
    /**
     * @var \App\Repository\UserRepositoryInterface $userRepository
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \App\DataTransferObject\UserDataProvider []
     */
    public function getRankingList():array
    {
        return $this->userRepository->getAllUserOrderedByScore();
    }

    /**
     * @return \App\DataTransferObject\UserDataProvider|null
     */
    public function getWinnerOfTheDay():?UserDataProvider
    {
        return $this->userRepository->getWinnerOfTheDay();
    }
}