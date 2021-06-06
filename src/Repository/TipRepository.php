<?php
declare(strict_types=1);

namespace App\Repository;


use App\DataTransferObject\TipDataProvider;
use App\Entity\Tip;
use App\Repository\Mapper\TipMapperInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tip[]    findAll()
 * @method Tip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class TipRepository extends ServiceEntityRepository implements TipRepositoryInterface
{
    /**
     * @var \App\Repository\Mapper\TipMapperInterface $tipMapper
     */
    private $tipMapper;

    public function __construct(ManagerRegistry $registry, TipMapperInterface $tipMapper)
    {
        parent::__construct($registry, Tip::class);
        $this->tipMapper = $tipMapper;
    }

    /**
     * @param String $name
     * @param string $matchId
     * @return \App\DataTransferObject\TipDataProvider|null
     */
    public function getOneByUserNameAndMatchId(string $name, string $matchId):?TipDataProvider
    {
        $tip = $this->findOneBy(['name' => $name, 'match_id' => $matchId]);
        if($tip instanceof Tip){
            return $this->tipMapper->mapToUserDataProvider($tip);
        }
        return null;
    }

    /**
     * @return TipDataProvider[]
     */
    public function getAllTipsFromSingleUser(string $name):array
    {
        $tipList = $this->findBy(['name' => $name]);
        $tipDataProviderList = [];

        foreach ($tipList as $tip){
            if($tip instanceof Tip){
                $tipDataProviderList[] = $this->tipMapper->mapToUserDataProvider($tip);
            }
        }
        return $tipDataProviderList;
    }

    /**
     * @return TipDataProvider[]
     */
    public function getAllTips():array
    {
        $tipList = $this->findAll();
        $tipDataProviderList = [];

        foreach ($tipList as $tip){
            if($tip instanceof Tip){
                $tipDataProviderList[] = $this->tipMapper->mapToUserDataProvider($tip);
            }
        }
        return $tipDataProviderList;
    }

}