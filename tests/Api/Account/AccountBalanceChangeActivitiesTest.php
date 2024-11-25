<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Schemes\Account\BalanceChangeActivitiesSchema;
use DFiks\Solscan\Schemes\Account\Collections\BalanceChangeActivitiesSchemaCollection;

class AccountBalanceChangeActivitiesTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::BalanceChangeActivities;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return BalanceChangeActivitiesSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return BalanceChangeActivitiesSchema::class;
    }
}
