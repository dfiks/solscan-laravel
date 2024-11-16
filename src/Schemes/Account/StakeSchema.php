<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class StakeSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getRoles(): ?array
    {
        return $this->getDataByKey('roles');
    }

    #[ParameterSchema]
    public function getStatus(): ?string
    {
        return $this->getDataByKey('status');
    }

    #[ParameterSchema]
    public function getType(): ?string
    {
        return $this->getDataByKey('type');
    }

    #[ParameterSchema('voter')]
    public function getVoterAddress(): ?string
    {
        return $this->getDataByKey('voter');
    }

    #[ParameterSchema]
    public function getActiveStakeAmount(): ?string
    {
        return $this->getDataByKey('active_stake_amount');
    }

    #[ParameterSchema]
    public function getDelegatedStakeAmount(): ?string
    {
        return $this->getDataByKey('delegated_stake_amount');
    }

    #[ParameterSchema]
    public function getSolBalance(): ?string
    {
        return $this->getDataByKey('sol_balance');
    }

    #[ParameterSchema]
    public function getTotalReward(): ?string
    {
        return $this->getDataByKey('total_reward');
    }

    #[ParameterSchema('stake_account')]
    public function getStakeAccountAddress(): ?string
    {
        return $this->getDataByKey('stake_account');
    }

    #[ParameterSchema]
    public function getActivationEpoch(): ?int
    {
        return $this->getDataByKey('activation_epoch');
    }

    #[ParameterSchema]
    public function getStakeType(): ?int
    {
        return $this->getDataByKey('stake_type');
    }
}
