<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenPriceSchema;

/**
 * @extends SchemaCollectionContract<TokenPriceSchema>
 */
class TokenPriceSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenPriceSchema>
     */
    protected function schema(): string
    {
        return TokenPriceSchema::class;
    }
}
