<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsInfoDataCreatorsCollection;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewInfoDataSchema extends SchemaContract
{
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
    public function getUri(): ?string
    {
        return $this->getDataByKey('uri');
    }

    #[ParameterSchema]
    public function getSellerFeeBasisPoints(): ?int
    {
        return $this->getDataByKey('sellerFeeBasisPoints');
    }

    #[ParameterSchema]
    public function getCreators(): NftNewsInfoDataCreatorsCollection
    {
        return new NftNewsInfoDataCreatorsCollection([
            'data' => $this->getDataByKey('creators'),
        ]);
    }

    #[ParameterSchema]
    public function getId(): ?int
    {
        return $this->getDataByKey('id');
    }
}
