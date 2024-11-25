<?php

namespace DFiks\Solscan\Core\Enums;

use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Schemes\SchemaCollectionContract;
use DFiks\Solscan\Schemes\Token\Collections\TokenDefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenHoldersSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenListSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenMarketsSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenPriceSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenTransferSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenTrendingSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenMarketInfoSchema;
use DFiks\Solscan\Schemes\Token\TokenMarketVolumeSchema;
use DFiks\Solscan\Schemes\Token\TokenMetaSchema;
use Illuminate\Support\Collection;

enum TokenMethod: string implements SolscanMethodContract
{
    case Transfer = 'transfer';
    case DefiActivities = 'defi/activities';
    case Markets = 'markets';
    case MarketInfo = 'market/info';
    case MarketVolume = 'market/volume';
    case List = 'list';
    case Trending = 'trending';
    case Price = 'price';
    case Holders = 'holders';
    case Meta = 'meta';

    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            TokenMethod::Transfer => TokenTransferSchemaCollection::fake(),
            TokenMethod::DefiActivities => TokenDefiActivitesSchemaCollection::fake(),
            TokenMethod::Markets => TokenMarketsSchemaCollection::fake(),
            TokenMethod::List => TokenListSchemaCollection::fake(),
            TokenMethod::Trending => TokenTrendingSchemaCollection::fake(),
            TokenMethod::Price => TokenPriceSchemaCollection::fake(),
            TokenMethod::Holders => TokenHoldersSchemaCollection::fake(),

            TokenMethod::MarketInfo => collect(TokenMarketInfoSchema::fake()->toArray()),
            TokenMethod::MarketVolume => collect(TokenMarketVolumeSchema::fake()->toArray()),
            TokenMethod::Meta => collect(TokenMetaSchema::fake()->toArray()),

            default => null,
        };
    }
}
