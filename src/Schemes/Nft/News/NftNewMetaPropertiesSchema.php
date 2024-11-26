<?php

namespace DFiks\Solscan\Schemes\Nft\News;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsMetaPropertiesFilesCollection;
use DFiks\Solscan\Schemes\SchemaContract;

class NftNewMetaPropertiesSchema extends SchemaContract
{
    #[ParameterSchema]
    public function files(): NftNewsMetaPropertiesFilesCollection
    {
        return new NftNewsMetaPropertiesFilesCollection([
            'data' => $this->getDataByKey('files'),
        ]);
    }

    #[ParameterSchema]
    public function getCategory(): ?string
    {
        return $this->getDataByKey('category');
    }
}
