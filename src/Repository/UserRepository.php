<?php
declare(strict_types=1);

namespace App\Repository;


use App\DataTransferObject\UserDataProvider;
use App\Entity\User;
use App\Repository\Mapper\UserMapperInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    /**
     * @var \App\Repository\Mapper\UserMapperInterface
     */
    private $userMapper;

    public function __construct(ManagerRegistry $registry, string $entityClass, UserMapperInterface $userMapper)
    {
        parent::__construct($registry, $entityClass);
        $this->userMapper = $userMapper;
    }

    /**
     * @param String $name
     * @return \App\DataTransferObject\UserDataProvider|null
     */
    public function getOneByName(string $name):?UserDataProvider
    {
        $user = $this->findOneBy(['name' => $name]);
        if($user instanceof User){
            return $this->userMapper->mapToUserDataProvider($user);
        }
        return null;
    }

    /**
     * @return UserDataProvider[]
     */
    public function getAllUser():array
    {
        $userList = $this->findAll();
        $userDataProviderList = [];

        foreach ($userList as $user){
            if($user instanceof User){
                $userDataProviderList[] = $this->userMapper->mapToUserDataProvider($user);
            }
        }
        return $userDataProviderList;
    }
}