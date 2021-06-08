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

    /**
     * GameRepository constructor.
     * @param \Doctrine\Persistence\ManagerRegistry $registry
     * @param \App\Repository\Mapper\GameMapperInterface $gameMapper
     */
    public function __construct(ManagerRegistry $registry, GameMapperInterface $gameMapper)
    {
        parent::__construct($registry, Game::class);
        $this->gameMapper = $gameMapper;
    }

    /**
     * @param String $matchId
     * @return \App\DataTransferObject\GameDataProvider|null
     */
    public function getOneByMatchId(string $matchId):?GameDataProvider
    {
        $game  = $this->createQueryBuilder('c')
            ->where('c.matchId = :matchId')
            ->setParameter('matchId', $matchId)
            ->getQuery()
            ->getOneOrNullResult();

        //$game = $this->findOneBy(['match_id' => $matchId]);
        if($game instanceof Game){
            return $this->gameMapper->mapToGameDataProvider($game);
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
                $matchList[] = $this->gameMapper->mapToGameDataProvider($game);
            }
        }
        return $matchList;
    }
}