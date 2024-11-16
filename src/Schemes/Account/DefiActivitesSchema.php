<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Schemes\SchemaContract;
use Illuminate\Support\Carbon;

class DefiActivitesSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getBlockId(): ?string
    {
        return $this->getDataByKey('block_id');
    }

    #[ParameterSchema('trans_id')]
    public function getTransactionId(): ?string
    {
        return $this->getDataByKey('trans_id');
    }

    #[ParameterSchema]
    public function getBlockTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('block_time'));
    }

    #[ParameterSchema]
    public function getTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('time'));
    }

    #[ParameterSchema]
    public function getActivityType(): ?ActivitySplType
    {
        return ActivitySplType::tryFrom($this->getDataByKey('activity_type')) ?? null;
    }

    #[ParameterSchema]
    public function getFromAddress(): ?string
    {
        return $this->getDataByKey('from_address');
    }

    #[ParameterSchema]
    public function getToAddress(): ?string
    {
        return $this->getDataByKey('to_address');
    }

    #[ParameterSchema]
    public function source(): array
    {
        return $this->getDataByKey('source');
    }

    #[ParameterSchema]
    public function getPlatform(): ?string
    {
        return $this->getDataByKey('platform');
    }

    public function getRouters(): ?RoutersSchema
    {
        return new RoutersSchema($this->getDataByKey('routers') ?? []);
    }
}
