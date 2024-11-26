<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewMetaAttributeSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTraitType(): ?string
    {
        return $this->getDataByKey('trait_type');
    }

    #[ParameterSchema]
    public function getValue(): ?string
    {
        return $this->getDataByKey('value');
    }
}
