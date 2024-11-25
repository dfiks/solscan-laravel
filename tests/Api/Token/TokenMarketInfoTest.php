<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Schemes\Token\TokenMarketInfoSchema;

class TokenMarketInfoTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::MarketInfo;
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
        return TokenMarketInfoSchema::class;
    }
}
