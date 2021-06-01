<?php
declare(strict_types=1);
namespace App\Repository;


use App\DataTransferObject\GameDataProvider;
use App\Entity\Game;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface GameRepositoryInterface
{
    /**
     * @param String $matchId
     * @return \App\DataTransferObject\GameDataProvider|null
     */
    public function getOneByMatchId(string $matchId): ?GameDataProvider;

    /**
     * @return GameDataProvider[]
     */
    public function getAllMatches(): array;
}