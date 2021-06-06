<?php
declare(strict_types=1);
namespace App\Service\Import\Helper;

use App\DataTransferObject\GameDataProvider;
use App\DataTransferObject\UserDataProvider;

interface ImportMapperInterface
{
    public function mapToUserDataProvider(array $inputJson): UserDataProvider;

    public function mapToGameDataProvider(array $inputJson): GameDataProvider;
}