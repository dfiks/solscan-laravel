<?php

namespace DFiks\Solscan\Schemes\Nft\Collections;

use DFiks\Solscan\Schemes\Nft\News\NftNewInfoDataCreatorSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<NftNewInfoDataCreatorSchema>
 */
class NftNewsInfoDataCreatorsCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<NftNewInfoDataCreatorSchema>
     */
    protected function schema(): string
    {
        return NftNewInfoDataCreatorSchema::class;
    }
}
