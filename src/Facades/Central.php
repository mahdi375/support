<?php

namespace Blytd\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getExhangeRatio(string $from, string $to)
 * @method static mixed exchange(string $from, string $to, float $value)
 * @method static mixed exchangeUsingRatio(float $value, float $ratio)
 *
 **/

class Central extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'central';
    }
}
