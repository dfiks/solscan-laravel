<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenMetaSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getTokenName(): ?string
    {
        return $this->getDataByKey('token_name');
    }

    #[ParameterSchema]
    public function getTokenSymbol(): ?string
    {
        return $this->getDataByKey('token_symbol');
    }

    #[ParameterSchema]
    public function getTokenIcon(): ?string
    {
        return $this->getDataByKey('token_icon');
    }
}
