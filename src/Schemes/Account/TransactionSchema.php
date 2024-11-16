<?php

namespace DFiks\Solscan\Schemes\Account;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Enums\TransactionStatus;
use DFiks\Solscan\Schemes\Account\Collections\ParsedInstructionsSchemaCollection;
use DFiks\Solscan\Schemes\SchemaContract;
use Illuminate\Support\Carbon;

class TransactionSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getSlot(): ?int
    {
        return $this->getDataByKey('slot');
    }

    #[ParameterSchema]
    public function getFee(): ?int
    {
        return $this->getDataByKey('fee');
    }

    #[ParameterSchema]
    public function getStatus(): ?TransactionStatus
    {
        return TransactionStatus::tryFrom($this->getDataByKey('status')) ?? null;
    }

    #[ParameterSchema]
    public function getSigner(): ?array
    {
        return $this->getDataByKey('signer');
    }

    #[ParameterSchema]
    public function getBlockTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('block_time')) ?? null;
    }

    #[ParameterSchema]
    public function getTxHash(): ?string
    {
        return $this->getDataByKey('tx_hash');
    }

    #[ParameterSchema]
    public function getParsedInstructions(): ParsedInstructionsSchemaCollection
    {
        return new ParsedInstructionsSchemaCollection(['data' => $this->getDataByKey('parsed_instructions')]);
    }

    #[ParameterSchema]
    public function getProgramIds(): array
    {
        return $this->getDataByKey('program_ids');
    }

    #[ParameterSchema]
    public function getTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('time')) ?? null;
    }
}
