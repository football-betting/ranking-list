<?php
declare(strict_types=1);
namespace App\Repository;


use App\DataTransferObject\TipDataProvider;
use App\Entity\Tip;

/**
 * @method Tip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tip[]    findAll()
 * @method Tip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface TipRepositoryInterface
{
    /**
     * @param String $name
     * @param string $matchId
     * @return \App\DataTransferObject\TipDataProvider|null
     */
    public function getOneByUserNameAndMatchId(string $name, string $matchId): ?TipDataProvider;

    /**
     * @return TipDataProvider[]
     */
    public function getAllTipsFromSingleUser(string $name): array;

    /**
     * @return TipDataProvider[]
     */
    public function getAllTips(): array;
}