<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenAccountsSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTokenAccount(): ?string
    {
        return $this->getDataByKey('token_account');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getTokenDecimals(): ?int
    {
        return $this->getDataByKey('token_decimals');
    }

    #[ParameterSchema]
    public function owner(): ?string
    {
        return $this->getDataByKey('owner');
    }
}
