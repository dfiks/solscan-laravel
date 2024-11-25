<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Schemes\Token\TokenMarketVolumeSchema;

class TokenMarketVolumeTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::MarketVolume;
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
        return TokenMarketVolumeSchema::class;
    }
}
