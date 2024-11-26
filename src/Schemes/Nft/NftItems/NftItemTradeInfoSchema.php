<?php

namespace DFiks\Solscan\Schemes\Nft\NftItems;

use Carbon\Carbon;
use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftItemTradeInfoSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTradeTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('trade_time'));
    }

    #[ParameterSchema]
    public function getSignature(): ?string
    {
        return $this->getDataByKey('signature');
    }

    #[ParameterSchema]
    public function getMarketId(): ?string
    {
        return $this->getDataByKey('market_id');
    }

    #[ParameterSchema]
    public function getType(): ?string
    {
        return $this->getDataByKey('type');
    }

    #[ParameterSchema]
    public function getPrice(): ?string
    {
        return $this->getDataByKey('price');
    }

    #[ParameterSchema]
    public function getCurrencyToken(): ?string
    {
        return $this->getDataByKey('currency_token');
    }

    #[ParameterSchema]
    public function getCurrencyDecimals(): ?int
    {
        return $this->getDataByKey('currency_decimals');
    }

    #[ParameterSchema]
    public function getSeller(): ?string
    {
        return $this->getDataByKey('seller');
    }

    #[ParameterSchema]
    public function getBuyer(): ?string
    {
        return $this->getDataByKey('buyer');
    }
}
