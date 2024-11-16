<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class RoutersSchema extends SchemaContract
{
    #[ParameterSchema('token1')]
    public function getFirstTokenAddress(): ?string
    {
        return $this->getDataByKey('token1');
    }

    #[ParameterSchema('token1_decimals')]
    public function getFirstTokenDecimals(): ?int
    {
        return $this->getDataByKey('token1_decimals');
    }

    #[ParameterSchema('amount1')]
    public function getFirstTokenAmount(): ?int
    {
        return $this->getDataByKey('amount1');
    }

    #[ParameterSchema('token2')]
    public function getSecondTokenAddress(): ?string
    {
        return $this->getDataByKey('token2');
    }

    #[ParameterSchema('token2_decimals')]
    public function getSecondTokenDecimals(): ?int
    {
        return $this->getDataByKey('token2_decimals');
    }

    #[ParameterSchema('amount2')]
    public function getSecondTokenAmount(): ?int
    {
        return $this->getDataByKey('amount2');
    }

    public function getChildRouters(): ?RoutersSchema
    {
        return new RoutersSchema($this->getDataByKey('child_routers') ?? []);
    }
}
