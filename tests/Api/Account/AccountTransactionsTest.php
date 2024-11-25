<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Schemes\Account\Collections\TransactionsSchemaCollection;
use DFiks\Solscan\Schemes\Account\TransactionSchema;

class AccountTransactionsTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::Transactions;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TransactionsSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TransactionSchema::class;
    }
}
