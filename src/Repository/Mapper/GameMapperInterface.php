<?php
declare(strict_types=1);
namespace App\Repository\Mapper;

use App\DataTransferObject\GameDataProvider;
use App\Entity\Game;

interface GameMapperInterface
{
    public function mapToUserDataProvider(Game $user): GameDataProvider;
}