<?php

namespace DFiks\Solscan\Facades;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Api\BlockApi;
use DFiks\Solscan\Api\MonitoringApi;
use DFiks\Solscan\Api\NFTApi;
use DFiks\Solscan\Api\TokenApi;
use DFiks\Solscan\Api\TransactionApi;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AccountApi account()
 * @method static TokenApi token()
 * @method static TransactionApi transaction()
 * @method static NFTApi nft()
 * @method static BlockApi block()
 * @method static MonitoringApi monitoring()
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
