<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenMarketsSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getPoolId(): ?string
    {
        return $this->getDataByKey('pool_id');
    }

    #[ParameterSchema]
    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    #[ParameterSchema('token_1')]
    public function getFirstToken(): ?string
    {
        return $this->getDataByKey('token_1');
    }

    #[ParameterSchema('token_2')]
    public function getSecondToken(): ?string
    {
        return $this->getDataByKey('token_2');
    }

    #[ParameterSchema('token_account_1')]
    public function getFirstTokenAccount(): ?string
    {
        return $this->getDataByKey('token_account_1');
    }

    #[ParameterSchema('token_account_2')]
    public function getSecondTokenAccount(): ?string
    {
        return $this->getDataByKey('token_account_2');
    }

    #[ParameterSchema]
    public function getTotalTrades24h(): ?int
    {
        return $this->getDataByKey('total_trades_24h');
    }

    #[ParameterSchema]
    public function totalVolume24h(): ?int
    {
        return $this->getDataByKey('total_volume_24h');
    }
}
