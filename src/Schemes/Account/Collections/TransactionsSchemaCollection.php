<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\TransactionSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<TransactionSchema>
 */
class TransactionsSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TransactionSchema>
     */
    protected function schema(): string
    {
        return TransactionSchema::class;
    }
}
