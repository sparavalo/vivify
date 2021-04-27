<?php

namespace App;

use App\Factory\BattleFactory;
use App\Factory\BeastFactory;
use App\Factory\HeroFactory;

class Kernel
{
    public static function init()
    {
        $hero = HeroFactory::create();
        $beast = BeastFactory::create();

        $battle = BattleFactory::create($hero, $beast);
        $battle->startBattle();
    }
}
