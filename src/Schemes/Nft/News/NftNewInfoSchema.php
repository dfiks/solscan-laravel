<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use Carbon\Carbon;
use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewInfoSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema('collection')]
    public function getCollectionName(): ?string
    {
        return $this->getDataByKey('collection');
    }

    #[ParameterSchema]
    public function getCollectionId(): ?string
    {
        return $this->getDataByKey('collectionId');
    }

    #[ParameterSchema]
    public function getCollectionKey(): ?string
    {
        return $this->getDataByKey('collectionKey');
    }

    #[ParameterSchema]
    public function getCreatedTime(): Carbon
    {
        return Carbon::parse($this->getDataByKey('createdTime'));
    }

    #[ParameterSchema]
    public function getData(): NftNewInfoDataSchema
    {
        return new NftNewInfoDataSchema($this->getDataByKey('data'));
    }
}
