<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Schemes\Account\Collections\TokenAccountsSchemaCollection;
use DFiks\Solscan\Schemes\Account\TokenAccountsSchema;

class AccountTokenAccountsTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::TokenAccounts;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenAccountsSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenAccountsSchema::class;
    }
}
