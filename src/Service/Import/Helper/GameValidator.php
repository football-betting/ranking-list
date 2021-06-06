<?php
declare(strict_types=1);

namespace App\Service\Import\Helper;


class GameValidator implements GameValidatorInterface
{
    /**
     * @param array $gameArray
     * @return bool
     */
    public function validate(array $gameArray):bool
    {
        foreach (RuleSet::Game as $key) {

            if (!isset($gameArray[$key])) {
                throw new Exception('Ungültiges JSON');
            }

        }
        return true;

    }
}