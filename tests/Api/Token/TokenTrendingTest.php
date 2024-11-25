<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenTrendingSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenTrendingSchema;

class TokenTrendingTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::Trending;
    }

    public function methodOptions(): array
    {
        return [];
    }

    public function schemaCollection(): string
    {
        return TokenTrendingSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenTrendingSchema::class;
    }
}
