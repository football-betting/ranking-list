<?php
declare(strict_types=1);

namespace App\Service\Import\Helper;


class UserValidator implements UserValidatorInterface
{
    /**
     * @param array $userArray
     * @return bool
     */
    public function validate(array $userArray):bool
    {
        foreach (RuleSet::User as $key) {

            if (!isset($userArray[$key])) {
                throw new Exception('Ungültiges JSON');
            }

        }
        return true;
    }
}