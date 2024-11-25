<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenListSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenListSchema;

class TokenListTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::List;
    }

    public function methodOptions(): array
    {
        return [];
    }

    public function schemaCollection(): string
    {
        return TokenListSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenListSchema::class;
    }
}
