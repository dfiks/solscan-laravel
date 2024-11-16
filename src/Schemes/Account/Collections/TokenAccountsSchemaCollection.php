<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\TokenAccountsSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<TokenAccountsSchema>
 */
class TokenAccountsSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenAccountsSchema>
     */
    protected function schema(): string
    {
        return TokenAccountsSchema::class;
    }
}
