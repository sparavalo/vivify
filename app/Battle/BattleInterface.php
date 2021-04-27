<?php

namespace App\Battle;

use App\Characters\Character;

interface BattleInterface
{
    public function loadHero(Character $hero);
    public function loadBeast(Character $beast);
    public function startBattle();
}
