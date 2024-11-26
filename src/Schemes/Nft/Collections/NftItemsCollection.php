<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\NftItems\NftItemSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftItemSchema>
 */
class NftItemsCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftItemSchema>
     */
    protected function schema(): string
    {
        return NftItemSchema::class;
    }
}
