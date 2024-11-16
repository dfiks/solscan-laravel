<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\AccountMethod;
use DFiks\Solscan\Schemes\Account\Collections\TransferSchemaCollection;
use DFiks\Solscan\Schemes\Account\TransferSchema;

class AccountTransferTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::Transfer;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TransferSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TransferSchema::class;
    }
}
