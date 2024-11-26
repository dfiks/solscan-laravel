<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\NftListSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftListSchema>
 */
class NftListCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftListSchema>
     */
    protected function schema(): string
    {
        return NftListSchema::class;
    }
}
