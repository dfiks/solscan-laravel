<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenListSchema;

/**
 * @extends SchemaCollectionContract<TokenListSchema>
 */
class TokenListSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenListSchema>
     */
    protected function schema(): string
    {
        return TokenListSchema::class;
    }
}
