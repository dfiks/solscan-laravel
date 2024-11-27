<?php

namespace DFiks\Solscan\Schemes\Transaction\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenDefiActivitiesSchema;
use DFiks\Solscan\Schemes\Transaction\TransactionLastSchema;

/**
 * @extends SchemaCollectionContract<TransactionLastSchema>
 */
class TransactionLastCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TransactionLastSchema>
     */
    protected function schema(): string
    {
        return TransactionLastSchema::class;
    }
}
