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

        return $userDataProvider;
    }
}