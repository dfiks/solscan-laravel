<?php

namespace DFiks\Solscan\Core\Enums\Methods;

use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Schemes\Nft\Collections\NftActivitiesCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftItemsCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftListCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsCollection;
use DFiks\Solscan\Schemes\SchemaCollectionContract;
use Illuminate\Support\Collection;

enum NftMethod: string implements SolscanMethodContract
{
    case News = 'news';
    case Activities = 'activities';
    case List = 'list';
    case Items = 'items';

    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            NftMethod::News => NftNewsCollection::fake(),
            NftMethod::Activities => NftActivitiesCollection::fake(),
            NftMethod::List => NftListCollection::fake(),
            NftMethod::Items => NftItemsCollection::fake(),

            default => null,
        };
    }
}
