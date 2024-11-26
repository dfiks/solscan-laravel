<?php

namespace DFiks\Solscan\Tests\Api\Nft;

use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsCollection;
use DFiks\Solscan\Schemes\Nft\News\NftNewSchema;

class NftNewsTest extends NftCase
{
    public function method(): NftMethod
    {
        return NftMethod::News;
    }

    public function methodOptions(): array
    {
        return [];
    }

    public function schemaCollection(): string
    {
        return NftNewsCollection::class;
    }

    public function schemaItem(): string
    {
        return NftNewSchema::class;
    }
}
