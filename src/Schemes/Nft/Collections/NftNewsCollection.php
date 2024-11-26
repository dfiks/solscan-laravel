<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\News\NftNewSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftNewSchema>
 */
class NftNewsCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftNewSchema>
     */
    protected function schema(): string
    {
        return NftNewSchema::class;
    }
}
