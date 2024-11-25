<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Schemes\Account\DetailSchema;

class AccountDetailTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::Detail;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): ?string
    {
        return null;
    }

    public function schemaItem(): string
    {
        return DetailSchema::class;
    }
}
