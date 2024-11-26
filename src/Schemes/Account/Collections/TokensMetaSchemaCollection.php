<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\TokenMetaSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<TokenMetaSchema>
 */
class TokensMetaSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenMetaSchema>
     */
    protected function schema(): string
    {
        return TokenMetaSchema::class;
    }
}
