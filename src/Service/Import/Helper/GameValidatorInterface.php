<?php
declare(strict_types=1);
namespace App\Service\Import\Helper;

interface GameValidatorInterface
{
    /**
     * @param array $userArray
     * @return bool
     */
    public function validate(array $gameArray): bool;
}