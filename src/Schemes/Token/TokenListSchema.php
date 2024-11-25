<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenListSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema]
    public function getDecimals(): ?int
    {
        return $this->getDataByKey('decimals');
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
    public function getMarketCap(): ?int
    {
        return $this->getDataByKey('market_cap');
    }

    #[ParameterSchema]
    public function getPrice(): ?int
    {
        return $this->getDataByKey('price');
    }

    #[ParameterSchema('price_24h_change')]
    public function getPrice24hChange(): ?int
    {
        return $this->getDataByKey('price_24h_change');
    }
}
