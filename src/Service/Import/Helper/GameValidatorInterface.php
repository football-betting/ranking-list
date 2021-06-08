<?php
declare(strict_types=1);
namespace App\Service\Import\Helper;

interface GameValidatorInterface
{
    /**
     * @param array $gameArray
     * @return bool
     */
    public function validate(array $gameArray): bool;
}