<?php

namespace DFiks\Solscan\Schemes\Nft;

use Carbon\Carbon;
use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Enums\ActivityNftType;
use DFiks\Solscan\Schemes\SchemaContract;

class NftActivitiesSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getBlockId(): ?int
    {
        return $this->getDataByKey('block_id');
    }

    #[ParameterSchema('trans_id')]
    public function getTransactionId(): ?int
    {
        return $this->getDataByKey('trans_id');
    }

    #[ParameterSchema]
    public function getBlockTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('block_time'));
    }

    #[ParameterSchema]
    public function getTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('time'));
    }

    #[ParameterSchema]
    public function getActivityType(): ?ActivityNftType
    {
        return ActivityNftType::tryFrom($this->getDataByKey('activity_type')) ?? null;
    }

    #[ParameterSchema]
    public function getFromAddress(): ?string
    {
        return $this->getDataByKey('from_address');
    }

    #[ParameterSchema]
    public function getToAddress(): ?string
    {
        return $this->getDataByKey('to_address');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getMarketplaceAddress(): ?string
    {
        return $this->getDataByKey('marketplace_address');
    }

    #[ParameterSchema]
    public function getCollectionAddress(): ?string
    {
        return $this->getDataByKey('collection_address');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getPrice(): ?int
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
}
