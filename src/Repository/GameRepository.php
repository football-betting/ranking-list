<?php
declare(strict_types=1);

namespace App\Repository;


use App\DataTransferObject\GameDataProvider;
use App\Entity\Game;
use App\Repository\Mapper\GameMapper;
use App\Repository\Mapper\GameMapperInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class GameRepository extends ServiceEntityRepository implements GameRepositoryInterface
{
    /***
     * @var \App\Repository\Mapper\GameMapperInterface
     */
    private $gameMapper;

    public function __construct(ManagerRegistry $registry, string $entityClass, GameMapperInterface $gameMapper)
    {
        parent::__construct($registry, $entityClass);
        $this->gameMapper = $gameMapper;
    }

    /**
     * @param String $matchId
     * @return \App\DataTransferObject\GameDataProvider|null
     */
    public function getOneByMatchId(string $matchId):?GameDataProvider
    {
        $game = $this->findOneBy(['match_id' => $matchId]);
        if($game instanceof Game){
            return $this->gameMapper->mapToUserDataProvider($game);
        }
        return null;
    }

    /**
     * @return GameDataProvider[]
     */
    public function getAllMatches():array{
        $listOfMatchEntities = $this->findAll();
        $matchList = [];
        foreach ($listOfMatchEntities as $game) {
            if ($game instanceof Game) {
                $matchList[] = $this->gameMapper->mapToUserDataProvider($game);
            }
        }
        return $matchList;
    }
}