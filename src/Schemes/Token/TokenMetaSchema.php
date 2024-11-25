<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenMetaSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
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
    public function getIcon(): ?string
    {
        return $this->getDataByKey('icon');
    }

    #[ParameterSchema]
    public function getDecimals(): ?int
    {
        return $this->getDataByKey('decimals');
    }

    #[ParameterSchema]
    public function getPrice(): ?float
    {
        return $this->getDataByKey('price');
    }

    #[ParameterSchema('volume_24h')]
    public function getVolume24h(): ?int
    {
        return $this->getDataByKey('volume_24h');
    }

    #[ParameterSchema]
    public function getMarketCap(): ?int
    {
        return $this->getDataByKey('market_cap');
    }

    #[ParameterSchema]
    public function getMarketCapRank(): ?int
    {
        return $this->getDataByKey('market_cap_rank');
    }

    #[ParameterSchema('price_change_24h')]
    public function getPriceChange24h(): ?float
    {
        return $this->getDataByKey('price_change_24h');
    }

    #[ParameterSchema]
    public function getSupply(): ?int
    {
        return $this->getDataByKey('supply');
    }

    #[ParameterSchema('holder')]
    public function getHoldersCount(): ?int
    {
        return $this->getDataByKey('holder');
    }
}
