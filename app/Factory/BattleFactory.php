<?php

namespace App\Factory;

use App\Battle\Battle;
use App\Characters\Character;
use App\Config\Stats;

class BattleFactory
{
    public static function create(Character $hero, Character $beast)
    {
        return (new Battle(new Stats))
            ->loadHero($hero)
            ->loadBeast($beast);
    }
}
