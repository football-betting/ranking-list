<?php
declare(strict_types=1);

namespace App\Service\Import\Helper;


class RuleSet
{
    public const Game = [
        'matchId',
        'team1',
        'team2',
        'matchDatetime',
        'scoreTeam1',
        'scoreTeam2',

    ];
    public const User = [
        'name',
        'position',
        'scoreSum',
        'tips',
    ];
}