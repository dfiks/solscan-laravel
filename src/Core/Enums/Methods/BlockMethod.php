<?php

namespace DFiks\Solscan\Core\Enums\Methods;

use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Schemes\Account\Collections\BalanceChangeActivitiesSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\DefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\StakeSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TokenAccountsSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TransactionsSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TransferSchemaCollection;
use DFiks\Solscan\Schemes\Account\DetailSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;
use Illuminate\Support\Collection;

enum BlockMethod: string implements SolscanMethodContract
{
    case Last = 'last';
    case Transactions = 'transactions';
    case Detail = 'detail';


    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            BlockMethod::Last => '',
            BlockMethod::Detail => '',
            BlockMethod::Transactions => '',


            default => null,
        };
    }
}
