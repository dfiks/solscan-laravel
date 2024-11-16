<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Enums\ChangeType;
use DFiks\Solscan\Schemes\SchemaContract;
use Illuminate\Support\Carbon;

class BalanceChangeActivitiesSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getBlockId(): ?string
    {
        return $this->getDataByKey('block_id');
    }

    #[ParameterSchema]
    public function getBlockTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('block_time')) ?? null;
    }

    #[ParameterSchema('trans_id')]
    public function getTransactionId(): ?string
    {
        return $this->getDataByKey('trans_id');
    }

    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema('token_address')]
    public function getAccountAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema('token_decimals')]
    public function getTokenDecimals(): ?int
    {
        return $this->getDataByKey('token_decimals');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getPreBalance(): ?int
    {
        return $this->getDataByKey('pre_balance');
    }

    #[ParameterSchema]
    public function getPostBalance(): ?int
    {
        return $this->getDataByKey('post_balance');
    }

    #[ParameterSchema]
    public function changeType(): ?ChangeType
    {
        return ChangeType::tryFrom($this->getDataByKey('change_type')) ?? null;
    }

    #[ParameterSchema]
    public function fee(): ?int
    {
        return $this->getDataByKey('fee');
    }

    #[ParameterSchema]
    public function time(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('time')) ?? null;
    }
}
