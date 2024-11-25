<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenMarketsSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenMarketsSchema;

class TokenMarketsTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Markets;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenMarketsSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenMarketsSchema::class;
    }
}
