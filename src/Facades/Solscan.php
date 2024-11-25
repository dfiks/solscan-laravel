<?php

namespace DFiks\Solscan\Facades;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Api\TokenApi;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AccountApi account()
 * @method static TokenApi token()
 */
class Solscan extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'solscan';
    }

    public static function fake(): void
    {
        $fake = app(static::getFacadeAccessor())->fake();

        app()->instance(static::getFacadeAccessor(), $fake);
    }
}
