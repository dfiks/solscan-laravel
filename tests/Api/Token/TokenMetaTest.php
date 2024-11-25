<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Schemes\Token\TokenMetaSchema;

class TokenMetaTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Meta;
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
        return TokenMetaSchema::class;
    }
}
