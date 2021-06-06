<?php
declare(strict_types=1);
namespace App\Service\Import\Helper;

interface UserValidatorInterface
{
    /**
     * @param array $userArray
     * @return bool
     */
    public function validate(array $userArray): bool;
}