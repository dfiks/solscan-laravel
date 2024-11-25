<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenHolderItemSchema;

/**
 * @extends SchemaCollectionContract<TokenHolderItemSchema>
 */
class TokenHolderItemsSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenHolderItemSchema>
     */
    protected function schema(): string
    {
        return TokenHolderItemSchema::class;
    }
}
