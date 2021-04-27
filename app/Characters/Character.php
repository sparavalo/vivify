<?php

namespace App\Characters;

use App\Config\Stats;

abstract class Character
{
    protected $name;

    protected $health;

    protected $attacks;

    public function getAttacks()
    {
        return $this->attacks;
    }

    public function setAttacks($attacks)
    {
        $this->attacks = $attacks;
        return $this;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
