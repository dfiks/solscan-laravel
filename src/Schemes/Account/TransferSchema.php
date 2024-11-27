<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Schemes\SchemaContract;
use Illuminate\Support\Carbon;

class TransferSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getBlockId(): ?int
    {
        return $this->getDataByKey('block_id');
    }

    #[ParameterSchema('trans_id')]
    public function getTransactionId(): ?string
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
    public function getActivityType(): ?ActivitySplType
    {
        return ActivitySplType::tryFrom($this->getDataByKey('activity_type'));
    }

    #[ParameterSchema]
    public function fromAddress(): ?string
    {
        return $this->getDataByKey('from_address');
    }

    #[ParameterSchema]
    public function toAddress(): ?string
    {
        return $this->getDataByKey('to_address');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getTokenDecimals(): ?int
    {
        return $this->getDataByKey('token_decimals');
    }

    #[ParameterSchema]
    public function getFlow(): ?string
    {
        return $this->getDataByKey('flow');
    }

    #[ParameterSchema]
    public function getFee(): ?int
    {
        return $this->getDataByKey('fee');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getValue(): ?float
    {
        return $this->getDataByKey('value');
    }
}
