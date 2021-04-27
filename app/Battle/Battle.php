<?php

namespace App\Battle;

use App\Characters\Character;
use App\Characters\Hero;
use App\Config\Stats;

class Battle implements BattleInterface
{
    private $hero = null;
    private $beast = null;
    private $stats;
    private $attacker;
    private $defender;
    private $lastAttack;

    public function __construct(Stats $stats)
    {
        $this->stats = $stats;
    }

    public function loadHero(Character $hero): Battle
    {
        $this->hero = $hero;
        return $this;
    }

    public function getHero(): ?Character
    {
        return $this->hero;
    }

    public function loadBeast(Character $beast): Battle
    {
        $this->beast = $beast;
        return $this;
    }

    public function getBeast(): ?Character
    {
        return $this->beast;
    }

    public function getAttacker()
    {
        return $this->attacker;
    }

    public function getDefender()
    {
        return $this->defender;
    }

    public function startBattle()
    {
        $this->firstAttack();

        while ($this->endOfBattle()) {
            $this->attack();
        }

        $this->checkWinner();
    }

    private function checkWinner()
    {
        if ($this->defender->getHealth() <= 0) {
            var_dump($this->attacker->getName() . ' je pobedio u duelu sa ' . $this->defender->getName());
        } else if ($this->attacker->getHealth() <= 0){
            var_dump($this->defender->getName() . ' je pobedio u duelu sa ' . $this->attacker->getName());
        }
    }

    private function endOfBattle()
    {
        if ($this->attacker->getHealth() > 0 && $this->defender->getHealth() > 0) {
            return true;
        }

        return false;
    }

    private function attack()
    {
        if ($this->lastAttack === 0) {
            $damage = $this->getAttack($this->attacker);
            $defenderHealth = $this->defender->getHealth() - $damage;
            $this->defender->setHealth($defenderHealth);
            $this->lastAttack = 1;
        } else {
            $damage = $this->getAttack($this->defender);
            $attackersHealth = $this->attacker->getHealth() - $damage;
            $this->attacker->setHealth($attackersHealth);
            $this->lastAttack = 0;
        }
    }

    private function getAttack(Character $character)
    {
        if ($character instanceof Hero) {
            $attacksArray = Stats::WEAPON_BAG_HERO;
            $randomAttack = array_rand($attacksArray);
            if (array_key_exists($attacksArray[$randomAttack], $character->getAttacks())) {
                return $character->getAttacks()[$attacksArray[$randomAttack]];
            }

            return 0;
        }

        $attacksArray = $character->getAttacks();
        $randomAttack = array_rand($attacksArray);

        return $attacksArray[$randomAttack];
    }

    private function firstAttack()
    {
        $random = mt_rand(0, 100);
        if ($random < 50) {
            $this->attacker = $this->hero;
            $this->defender = $this->beast;
        } else {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;
        }
    }
}
