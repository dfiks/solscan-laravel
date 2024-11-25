<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenPriceSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenPriceSchema;

class TokenPriceTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Price;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenPriceSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenPriceSchema::class;
    }
}
