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

    public function __construct(ManagerRegistry $registry, UserMapperInterface $userMapper)
    {
        parent::__construct($registry, User::class);
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
    public function getAllUserOrderedByScore():array
    {
        $userList = $this->createQueryBuilder('p')
        ->orderBy('p.scoreSum', 'DESC')
        ->getQuery()
        ->getArrayResult();


        $userDataProviderList = [];

        foreach ($userList as $user){
            if($user instanceof User){
                $userDataProviderList[] = $this->userMapper->mapToUserDataProvider($user);
            }
        }
        return $userDataProviderList;
    }

    /**
     * @return \App\DataTransferObject\UserDataProvider|null
     */
    public function getWinnerOfTheDay(): ?UserDataProvider
    {
        $userList = $this->createQueryBuilder('p')
            ->orderBy('p.scoreSum', 'DESC')
            ->getQuery()
            ->getArrayResult();
        if($userList[0] instanceof User) {
            return $this->userMapper->mapToUserDataProvider($userList[0]);
        }
        return null;
    }
}