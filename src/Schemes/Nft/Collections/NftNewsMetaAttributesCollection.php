<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\News\NftNewMetaAttributeSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftNewMetaAttributeSchema>
 */
class NftNewsMetaAttributesCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftNewMetaAttributeSchema>
     */
    protected function schema(): string
    {
        return NftNewMetaAttributeSchema::class;
    }
}
