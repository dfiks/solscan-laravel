<?php

namespace DFiks\Solscan\Core\Enums\Methods;

use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Schemes\SchemaCollectionContract;
use Illuminate\Support\Collection;

enum TransactionMethod: string implements SolscanMethodContract
{
    public function getFakeSchema(): SchemaCollectionContract|Collection|null
    {
        return match ($this) {
            default => null,
        };
    }
}
