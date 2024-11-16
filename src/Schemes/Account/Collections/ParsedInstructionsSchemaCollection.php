<?php

namespace DFiks\Solscan\Schemes\Account\Collections;

use DFiks\Solscan\Schemes\Account\ParsedInstructionSchema;
use DFiks\Solscan\Schemes\SchemaCollectionContract;

/**
 * @extends SchemaCollectionContract<ParsedInstructionSchema>
 */
class ParsedInstructionsSchemaCollection extends SchemaCollectionContract
{
    /**
     * @return class-string<ParsedInstructionSchema>
     */
    protected function schema(): string
    {
        return ParsedInstructionSchema::class;
    }
}
