<?php

namespace DFiks\Solscan\Schemes\Nft\NftItems;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\Nft\News\NftNewInfoDataSchema;
use DFiks\Solscan\Schemes\Nft\News\NftNewMetaSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class NftItemSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTradeInfo(): NftItemTradeInfoSchema
    {
        return new NftItemTradeInfoSchema($this->getDataByKey('tradeInfo'));
    }

    #[ParameterSchema]
    public function getInfo(): NftNewInfoDataSchema
    {
        return new NftNewInfoDataSchema($this->getDataByKey('info'));
    }

    #[ParameterSchema]
    public function getMeta(): NftNewMetaSchema
    {
        return new NftNewMetaSchema($this->getDataByKey('meta'));
    }
}
