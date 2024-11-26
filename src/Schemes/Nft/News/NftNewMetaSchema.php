<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use Carbon\Carbon;
use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsMetaAttributesCollection;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewMetaSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getImage(): ?string
    {
        return $this->getDataByKey('image');
    }

    #[ParameterSchema]
    public function getExternalUrl(): ?string
    {
        return $this->getDataByKey('external_url');
    }

    #[ParameterSchema]
    public function getCreatedTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('created_time')) ?? null;
    }

    #[ParameterSchema]
    public function getTokenId(): ?int
    {
        return $this->getDataByKey('tokenId');
    }

    #[ParameterSchema]
    public function getName(): ?string
    {
        return $this->getDataByKey('name');
    }

    #[ParameterSchema]
    public function getSymbol(): ?string
    {
        return $this->getDataByKey('symbol');
    }

    #[ParameterSchema]
    public function getDescription(): ?string
    {
        return $this->getDataByKey('description');
    }

    #[ParameterSchema]
    public function getSellerFeeBasisPoints(): ?int
    {
        return $this->getDataByKey('seller_fee_basis_points');
    }

    #[ParameterSchema]
    public function getEdition(): ?int
    {
        return $this->getDataByKey('edition');
    }

    #[ParameterSchema]
    public function getAttributes(): NftNewsMetaAttributesCollection
    {
        return new NftNewsMetaAttributesCollection([
            'data' => $this->getDataByKey('attributes'),
        ]);
    }

    #[ParameterSchema]
    public function getProperties(): NftNewMetaPropertiesSchema
    {
        return new NftNewMetaPropertiesSchema($this->getDataByKey('properties'));
    }

    #[ParameterSchema]
    public function getRetried(): ?int
    {
        return $this->getDataByKey('retried');
    }
}
