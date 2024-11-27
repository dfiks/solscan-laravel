<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionDetailParsedInstructionSchema extends SchemaContract
{
    public function getInsIndex(): ?int
    {
        return $this->getDataByKey('ins_index');
    }

    public function getParsedType(): ?string
    {
        return $this->getDataByKey('parsed_type');
    }

    public function getType(): ?string
    {
        return $this->getDataByKey('type');
    }

    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    public function getProgram(): ?string
    {
        return $this->getDataByKey('program');
    }

    public function getOuterProgramId(): ?string
    {
        return $this->getDataByKey('outer_program_id');
    }

    public function getOuterInsIndex(): ?int
    {
        return $this->getDataByKey('outer_ins_index');
    }

    public function getDataRaw(): mixed
    {
        return $this->getDataByKey('data_raw');
    }

    public function getAccounts(): array
    {
        return $this->getDataByKey('accounts');
    }

    public function getActivities()
    {

    }

    public function getTransfers()
    {

    }
}
