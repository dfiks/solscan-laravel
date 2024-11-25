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

enum AccountMethod: string implements SolscanMethodContract
{
    case Transfer = 'transfer';
    case TokenAccounts = 'token-accounts';
    case DefiActivities = 'defi/activities';
    case BalanceChangeActivities = 'balance_change_activities';
    case Transactions = 'transactions';
    case Stake = 'stake';
    case Detail = 'detail';

    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            AccountMethod::Transfer => TransferSchemaCollection::fake(),
            AccountMethod::TokenAccounts => TokenAccountsSchemaCollection::fake(),
            AccountMethod::DefiActivities => DefiActivitesSchemaCollection::fake(),
            AccountMethod::BalanceChangeActivities => BalanceChangeActivitiesSchemaCollection::fake(),
            AccountMethod::Transactions => TransactionsSchemaCollection::fake(),
            AccountMethod::Stake => StakeSchemaCollection::fake(),

            AccountMethod::Detail => collect(DetailSchema::fake()->toArray()),

            default => null,
        };
    }
}
