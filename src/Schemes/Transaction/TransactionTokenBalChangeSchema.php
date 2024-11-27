<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionTokenBalChangeSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
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
    public function getChangeAmount(): ?int
    {
        return $this->getDataByKey('change_amount');
    }

    #[ParameterSchema]
    public function getChangeType(): ?string
    {
        return $this->getDataByKey('change_type');
    }

    #[ParameterSchema]
    public function getDecimals(): ?int
    {
        return $this->getDataByKey('decimals');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getOwner(): ?string
    {
        return $this->getDataByKey('owner');
    }

    #[ParameterSchema]
    public function getPostOwner(): ?string
    {
        return $this->getDataByKey('post_owner');
    }

    #[ParameterSchema]
    public function getPreOwner(): ?string
    {
        return $this->getDataByKey('pre_owner');
    }
}
