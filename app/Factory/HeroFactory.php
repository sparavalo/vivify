<?php

namespace App\Factory;

use App\Characters\Hero;
use App\Config\Stats;

class HeroFactory implements CharacterFactory
{
    public static function create()
    {
        $heroKey = array_rand(Stats::HERO_TYPE);
        $heroType = Stats::HERO_TYPE[$heroKey];
        $stats = Stats::HERO[$heroType];

        $hero = new Hero();
        $hero->setName($heroType);
        $hero->setHealth($stats['health']);
        $hero->setAttacks($stats['attacks']);

        return $hero;
    }
}
