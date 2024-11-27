<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\TransferSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<TransferSchema>
 */
class TransferSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<TransferSchema>
     */
    protected function schema(): string
    {
        return TransferSchema::class;
    }

    public function tokens(): ?TokensMetaSchemaCollection
    {
        $data = collect($this->originalResponse['data']['metadata'] ?? []);

        return new TokensMetaSchemaCollection(['data' => $data]);
    }
}
