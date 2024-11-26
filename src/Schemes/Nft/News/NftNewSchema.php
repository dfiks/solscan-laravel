<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewSchema extends SchemaContract
{
    #[ParameterSchema]
    public function info(): NftNewInfoDataSchema
    {
        return new NftNewInfoDataSchema($this->getDataByKey('info'));
    }

    #[ParameterSchema]
    public function meta(): NftNewMetaSchema
    {
        return new NftNewMetaSchema($this->getDataByKey('meta'));
    }

    #[ParameterSchema]
    public function mintTx(): ?string
    {
        return $this->getDataByKey('mintTx');
    }
}
