<?php
declare(strict_types=1);
namespace App\Repository\Mapper;

use App\DataTransferObject\UserDataProvider;
use App\Entity\User;

interface UserMapperInterface
{
    /**
     * @param \App\Entity\User $user
     * @return \App\DataTransferObject\UserDataProvider
     */
    public function mapToUserDataProvider(User $user): UserDataProvider;

    public function mapToGameEntity(UserDataProvider $userDataProvider):User;
}