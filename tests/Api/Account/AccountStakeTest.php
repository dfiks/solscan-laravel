<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\AccountMethod;
use DFiks\Solscan\Schemes\Account\Collections\StakeSchemaCollection;
use DFiks\Solscan\Schemes\Account\StakeSchema;

class AccountStakeTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::Stake;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return StakeSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return StakeSchema::class;
    }
}
