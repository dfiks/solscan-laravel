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

    public function getTokenName(): ?string
    {
        return $this->getDataByKey('token_name');
    }

    public function getTokenSymbol(): ?string
    {
        return $this->getDataByKey('token_symbol');
    }
}
