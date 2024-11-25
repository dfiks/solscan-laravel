<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Token\Collections\TokenHolderItemsSchemaCollection;

class TokenHolderSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getTotal(): ?int
    {
        return $this->getDataByKey('total');
    }

    public function getItems(): TokenHolderItemsSchemaCollection
    {
        return new TokenHolderItemsSchemaCollection(['data' => $this->getDataByKey('items')]);
    }
}
