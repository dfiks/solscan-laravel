<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionLastSchema extends SchemaContract
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
    public function getStatus(): ?string
    {
        return $this->getDataByKey('status');
    }

    #[ParameterSchema]
    public function getSinger(): ?array
    {
        return $this->getDataByKey('singer');
    }

    #[ParameterSchema]
    public function getBlockTime(): ?Carbon
    {
        return Carbon::parse($this->getDataByKey('block_time'));
    }

    #[ParameterSchema]
    public function getTxHash(): ?string
    {
        return $this->getDataByKey('tx_hash');
    }

    #[ParameterSchema]
    public function getParsedInstructions(): TransactionParsedInstructionsCollection
    {
        return new TransactionParsedInstructionsCollection([
            'data' => $this->getDataByKey('parsed_instructions')
        ]);
    }

    #[ParameterSchema]
    public function getProgramIds(): array
    {
        return $this->getDataByKey('program_ids');
    }

    #[ParameterSchema]
    public function getTime(): Carbon
    {
        return Carbon::parse($this->getDataByKey('time'));
    }
}
