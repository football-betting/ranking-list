<?php
declare(strict_types=1);
namespace App\Repository;


use App\DataTransferObject\UserDataProvider;
use App\Entity\User;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface UserRepositoryInterface
{
    /**
     * @param String $name
     * @return \App\DataTransferObject\UserDataProvider|null
     */
    public function getOneByName(string $name): ?UserDataProvider;

    /**
     * @return UserDataProvider[]
     */
    public function getAllUser(): array;
}