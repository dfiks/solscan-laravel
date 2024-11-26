<?php

namespace DFiks\Solscan\Tests\Api\Nft;

use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Schemes\Nft\Collections\NftItemsCollection;
use DFiks\Solscan\Schemes\Nft\NftItems\NftItemSchema;

class NftItemsTest extends NftCase
{
    public function method(): NftMethod
    {
        return NftMethod::Items;
    }

    public function methodOptions(): array
    {
        return [
            'collectionAddress' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return NftItemsCollection::class;
    }

    public function schemaItem(): string
    {
        return NftItemSchema::class;
    }
}
