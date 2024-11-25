<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenHolderSchema;

/**
 * @extends SchemaCollectionContract<TokenHolderSchema>
 */
class TokenHoldersSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenHolderSchema>
     */
    protected function schema(): string
    {
        return TokenHolderSchema::class;
    }
}
