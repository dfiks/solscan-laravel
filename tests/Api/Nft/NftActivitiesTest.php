<?php

namespace DFiks\Solscan\Tests\Api\Nft;

use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Schemes\Nft\Collections\NftActivitiesCollection;
use DFiks\Solscan\Schemes\Nft\NftActivitiesSchema;

class NftActivitiesTest extends NftCase
{
    public function method(): NftMethod
    {
        return NftMethod::Activities;
    }

    public function methodOptions(): array
    {
        return [];
    }

    public function schemaCollection(): string
    {
        return NftActivitiesCollection::class;
    }

    public function schemaItem(): string
    {
        return NftActivitiesSchema::class;
    }
}
