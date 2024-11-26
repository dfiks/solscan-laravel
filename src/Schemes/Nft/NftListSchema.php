<?php

namespace DFiks\Solscan\Schemes\Nft;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftListSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getCollectionId(): ?string
    {
        return $this->getDataByKey('collection_id');
    }

    #[ParameterSchema]
    public function getName(): ?string
    {
        return $this->getDataByKey('name');
    }

    #[ParameterSchema]
    public function getSymbol(): ?string
    {
        return $this->getDataByKey('symbol');
    }

    #[ParameterSchema]
    public function getFloorPrice(): ?float
    {
        return $this->getDataByKey('floor_price');
    }

    #[ParameterSchema('items')]
    public function getItemsCount(): ?int
    {
        return $this->getDataByKey('items');
    }

    #[ParameterSchema]
    public function getMarketplaces(): ?array
    {
        return $this->getDataByKey('marketplaces');
    }

    #[ParameterSchema]
    public function getVolumes(): ?float
    {
        return $this->getDataByKey('volumes');
    }

    #[ParameterSchema('total_vol_prev_24h')]
    public function getTotalVolPrev24h(): ?float
    {
        return $this->getDataByKey('total_vol_prev_24h');
    }
}
