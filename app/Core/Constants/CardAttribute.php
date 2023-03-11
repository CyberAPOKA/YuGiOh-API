<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class CardAttribute extends Enum
{
    const DARK   = 'dark';
    const DIVINE = 'divine';
    const EARTH  = 'earth';
    const FIRE   = 'fire';
    const LIGHT  = 'light';
    const WATER  = 'water';
    const WIND   = 'wind';

    static $labels = [
        self::DARK => 'Escuridão',
        self::DIVINE => 'Divino',
        self::EARTH => 'Terra',
        self::FIRE => 'Fogo',
        self::LIGHT => 'Luz',
        self::WATER => 'Água',
        self::WIND => 'Vento'
    ];

    static $assets = [
        self::DARK => 'assets/DARK.svg',
        self::DIVINE => 'assets/DIVINE.svg',
        self::EARTH => 'assets/EARTH.svg',
        self::FIRE => 'assets/FIRE.svg',
        self::LIGHT => 'assets/LIGHT.svg',
        self::WATER => 'assets/WATER.svg',
        self::WIND => 'assets/WIND.svg',
    ];

    public static function image(string $status)
    {
        return asset(self::$assets[$status]);
    }
}
