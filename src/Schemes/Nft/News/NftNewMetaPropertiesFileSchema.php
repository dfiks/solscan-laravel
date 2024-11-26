<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewMetaPropertiesFileSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getUri(): ?string
    {
        return $this->getDataByKey('uri');
    }

    #[ParameterSchema('type')]
    public function getMimeType(): ?string
    {
        return $this->getDataByKey('type');
    }
}
