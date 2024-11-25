<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenHoldersSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenHolderSchema;

class TokenHoldersTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Holders;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenHoldersSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenHolderSchema::class;
    }
}
