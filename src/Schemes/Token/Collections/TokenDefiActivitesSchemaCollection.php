<?php

namespace DFiks\Solscan\Schemes\Token\Collections;

use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\TokenDefiActivitiesSchema;

/**
 * @extends SchemaCollectionContract<TokenDefiActivitiesSchema>
 */
class TokenDefiActivitesSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TokenDefiActivitiesSchema>
     */
    protected function schema(): string
    {
        return TokenDefiActivitiesSchema::class;
    }
}
