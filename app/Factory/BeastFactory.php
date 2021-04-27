<?php

namespace App\Factory;

use App\Characters\Beast;
use App\Config\Stats;

class BeastFactory implements CharacterFactory
{

    public static function create()
    {
        $beastKey = array_rand(Stats::BEAST_TYPE);
        $beastType = Stats::BEAST_TYPE[$beastKey];
        $stats = Stats::BEAST[$beastType];
        $beast = new Beast();
        $beast->setName($beastType);
        $beast->setHealth(mt_rand($stats['health'][0], $stats['health'][1]));
        $beast->setAttacks($stats['attacks']);

        return $beast;
    }
}
