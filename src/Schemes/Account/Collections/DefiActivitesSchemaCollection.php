<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\DefiActivitesSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<DefiActivitesSchema>
 */
class DefiActivitesSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<DefiActivitesSchema>
     */
    protected function schema(): string
    {
        return DefiActivitesSchema::class;
    }
}
