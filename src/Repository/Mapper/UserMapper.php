<?php
declare(strict_types=1);

namespace App\Repository\Mapper;


use App\DataTransferObject\UserDataProvider;
use App\Entity\User;

class UserMapper implements UserMapperInterface
{
    /**
     * @param \App\Entity\User $user
     * @return \App\DataTransferObject\UserDataProvider
     */
    public function mapToUserDataProvider(User $user):UserDataProvider
    {
        $userDataProvider = new UserDataProvider();
        $userDataProvider->setIdent($user->getId());
        $userDataProvider->setName($user->getName());
        $userDataProvider->setPosition($user->getPosition());
        $userDataProvider->setPositionDaily($user->getPositionDaily());
        $userDataProvider->setScoreSum($user->getScoreSum());
        $userDataProvider->setScoreDaily($user->getScoreDaily());
        $userDataProvider->setTips($user->getTips());
        return $userDataProvider;
    }
    public function mapToGameEntity(UserDataProvider $userDataProvider):User
    {
        $user = new User();
        $user->setId($userDataProvider->getIdent());
        $user->setName($userDataProvider->getName());
        $user->setPosition($userDataProvider->getPosition());
        $user->setPositionDaily($userDataProvider->getPositionDaily());
        $user->setScoreSum($userDataProvider->getScoreSum());
        $user->setScoreDaily($userDataProvider->getScoreDaily());
        $user->setTips($userDataProvider->getTips());
        return $user;
    }
}