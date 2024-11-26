<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\News\NftNewMetaPropertiesFileSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftNewMetaPropertiesFileSchema>
 */
class NftNewsMetaPropertiesFilesCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftNewMetaPropertiesFileSchema>
     */
    protected function schema(): string
    {
        return NftNewMetaPropertiesFileSchema::class;
    }
}
