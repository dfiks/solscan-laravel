<?php

namespace DFiks\Solscan\Schemes\Token;

use Carbon\Carbon;
use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenPriceSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getDate(): Carbon
    {
        return Carbon::parse($this->getDataByKey('date'));
    }

    #[ParameterSchema]
    public function getPrice(): ?float
    {
        return $this->getDataByKey('price');
    }
}
