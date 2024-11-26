<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewInfoDataCreatorSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema('verified')]
    public function isVerified(): ?bool
    {
        return $this->getDataByKey('verified');
    }

    #[ParameterSchema]
    public function getShare(): ?int
    {
        return $this->getDataByKey('share');
    }
}
