<?php
declare(strict_types=1);
namespace App\Repository\Mapper;

use App\DataTransferObject\TipDataProvider;
use App\Entity\Tip;

interface TipMapperInterface
{
    public function mapToUserDataProvider(Tip $user): TipDataProvider;
}