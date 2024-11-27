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

enum MonitorMethod: string implements SolscanMethodContract
{
    case Usage = 'usage';

    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            MonitorMethod::Usage => '',

            default => null,
        };
    }
}
