<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenHolderItemSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getDecimals(): ?int
    {
        return $this->getDataByKey('decimals');
    }

    #[ParameterSchema]
    public function getOwner(): ?string
    {
        return $this->getDataByKey('owner');
    }

    #[ParameterSchema]
    public function getRank(): ?int
    {
        return $this->getDataByKey('rank');
    }
}
