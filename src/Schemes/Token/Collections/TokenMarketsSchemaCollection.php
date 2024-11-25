<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenMarketsSchema;

/**
 * @extends SchemaCollectionContract<TokenMarketsSchema>
 */
class TokenMarketsSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenMarketsSchema>
     */
    protected function schema(): string
    {
        return TokenMarketsSchema::class;
    }
}
