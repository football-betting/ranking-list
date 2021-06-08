<?php
declare(strict_types=1);

namespace App\Service\Import\Helper;


use Exception;

class GameValidator implements GameValidatorInterface
{
    /**
     * @param array $gameArray
     * @return bool
     * @throws \Exception
     */
    public function validate(array $gameArray):bool
    {
        foreach (RuleSet::Game as $key) {

            if (!array_key_exists($key, $gameArray)) {
                throw new Exception('Ungültiges JSON');
            }elseif ($key !== 'scoreTeam1' && $key !== 'scoreTeam2'){
                if(!isset($gameArray[$key])){
                    throw new Exception('Ungültiges JSON');
                }
            }

        }
        return true;

    }
}