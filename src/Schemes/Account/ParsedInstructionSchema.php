<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class ParsedInstructionSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getType(): ?string
    {
        return $this->getDataByKey('type');
    }

    #[ParameterSchema]
    public function getProgram(): ?string
    {
        return $this->getDataByKey('program');
    }

    #[ParameterSchema]
    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }
}
