<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenTransferSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenTransferSchema;

class TokenTransferTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Transfer;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenTransferSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenTransferSchema::class;
    }
}
