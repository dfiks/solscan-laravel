<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\NftActivitiesSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftActivitiesSchema>
 */
class NftActivitiesCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftActivitiesSchema>
     */
    protected function schema(): string
    {
        return NftActivitiesSchema::class;
    }
}
