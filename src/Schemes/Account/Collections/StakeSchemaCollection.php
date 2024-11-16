<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\StakeSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<StakeSchema>
 */
class StakeSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<StakeSchema>
     */
    protected function schema(): string
    {
        return StakeSchema::class;
    }
}
