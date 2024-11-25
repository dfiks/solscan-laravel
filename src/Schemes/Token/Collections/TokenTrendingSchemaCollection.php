<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenTrendingSchema;

/**
 * @extends SchemaCollectionContract<TokenTrendingSchema>
 */
class TokenTrendingSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenTrendingSchema>
     */
    protected function schema(): string
    {
        return TokenTrendingSchema::class;
    }
}
