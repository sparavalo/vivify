<?php

namespace App\Config;

class Stats {

    CONST HERO_TYPE = [
        'wizard',
        'swordsman'
    ];

    const HERO = [
        'wizard' => [
            'health' => 150,
            'attacks' => [
                'spell' => 20
            ]
        ],
        'swordsman' => [
            'health' => 100,
            'attacks' => [
                'sword' => 10,
                'spear' => 15
            ]
        ]
    ];

    const WEAPON_BAG_HERO = [
        'sword',
        'spear',
        'spell'
    ];

    const BEAST_TYPE = [
        'spider',
        'dragon'
    ];

    const BEAST = [
        'spider' => [
            'health' => [65, 100],
            'attacks' => [
                'hit' => 5,
                'bite' => 8
            ]
        ],
        'dragon' => [
            'health' => [65, 100],
            'attacks' => [
                'hit' => 5,
                'fire' => 20
            ]
        ]
    ];
}
