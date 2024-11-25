<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenTransferSchema;

/**
 * @extends SchemaCollectionContract<TokenTransferSchema>
 */
class TokenTransferSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenTransferSchema>
     */
    protected function schema(): string
    {
        return TokenTransferSchema::class;
    }
}
