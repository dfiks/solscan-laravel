<?php

namespace DFiks\Solscan\Schemes\Transaction\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenDefiActivitiesSchema;
use DFiks\Solscan\Schemes\Transaction\TransactionInstructionSchema;
use DFiks\Solscan\Schemes\Transaction\TransactionLastSchema;

/**
 * @extends SchemaCollectionContract<TransactionInstructionSchema>
 */
class TransactionParsedInstructionsCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TransactionInstructionSchema>
     */
    protected function schema(): string
    {
        return TransactionInstructionSchema::class;
    }
}
