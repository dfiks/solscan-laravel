<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\BalanceChangeActivitiesSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<BalanceChangeActivitiesSchema>
 */
class BalanceChangeActivitiesSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<BalanceChangeActivitiesSchema>
     */
    protected function schema(): string
    {
        return BalanceChangeActivitiesSchema::class;
    }
}
