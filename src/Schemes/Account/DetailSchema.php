<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class DetailSchema extends SchemaContract
{
    #[ParameterSchema('account')]
    public function getAccountAddress(): ?string
    {
        return $this->getDataByKey('account');
    }

    #[ParameterSchema]
    public function getLamports(): ?int
    {
        return $this->getDataByKey('lamports');
    }

    #[ParameterSchema]
    public function getType(): ?string
    {
        return $this->getDataByKey('type');
    }

    #[ParameterSchema]
    public function getExecutable(): ?bool
    {
        return $this->getDataByKey('executable');
    }

    #[ParameterSchema]
    public function getOwnerProgram(): ?string
    {
        return $this->getDataByKey('owner_program');
    }

    #[ParameterSchema]
    public function getRentEpoch(): ?int
    {
        return $this->getDataByKey('rent_epoch');
    }

    #[ParameterSchema]
    public function isOncurve(): ?bool
    {
        return $this->getDataByKey('is_oncurve');
    }
}
