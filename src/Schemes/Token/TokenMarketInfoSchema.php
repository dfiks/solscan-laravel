<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenMarketInfoSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getPoolAddress(): ?string
    {
        return $this->getDataByKey('pool_address');
    }

    #[ParameterSchema]
    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    #[ParameterSchema('token1')]
    public function getFirstToken(): ?string
    {
        return $this->getDataByKey('token1');
    }

    #[ParameterSchema('token2')]
    public function getSecondToken(): ?string
    {
        return $this->getDataByKey('token2');
    }

    #[ParameterSchema('token1_account')]
    public function getFirstTokenAccount(): ?string
    {
        return $this->getDataByKey('token1_account');
    }

    #[ParameterSchema('token2_account')]
    public function getSecondTokenAccount(): ?string
    {
        return $this->getDataByKey('token2_account');
    }

    #[ParameterSchema('token1_amount')]
    public function getFirstTokenAmount(): ?int
    {
        return $this->getDataByKey('token1_amount');
    }

    #[ParameterSchema('token2_amount')]
    public function getSecondTokenAmount(): ?int
    {
        return $this->getDataByKey('token2_amount');
    }
}
