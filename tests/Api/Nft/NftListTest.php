<?php

namespace DFiks\Solscan\Tests\Api\Nft;

use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Schemes\Nft\Collections\NftListCollection;
use DFiks\Solscan\Schemes\Nft\NftListSchema;

class NftListTest extends NftCase
{
    public function method(): NftMethod
    {
        return NftMethod::List;
    }

    public function methodOptions(): array
    {
        return [];
    }

    public function schemaCollection(): string
    {
        return NftListCollection::class;
    }

    public function schemaItem(): string
    {
        return NftListSchema::class;
    }
}
