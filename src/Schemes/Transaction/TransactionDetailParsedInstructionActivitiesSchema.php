<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionDetailParsedInstructionActivitiesSchema extends SchemaContract
{
    public function getName(): ?string
    {
        return $this->getDataByKey('name');
    }

    public function getActivityType(): ?string
    {
        return $this->getDataByKey('activity_type');
    }

    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    public function getData(): ?array
    {
        return $this->getDataByKey('data');
    }

    public function getInsIndex(): ?int
    {
        return $this->getDataByKey('ins_index');
    }

    public function getOuterInsIndex(): ?int
    {
        return $this->getDataByKey('outer_ins_index');
    }

    public function getOuterProgramId(): ?string
    {
        return $this->getDataByKey('outer_program_id');
    }

    public function getProgramInvokeLevel(): ?int
    {
        return $this->getDataByKey('program_invoke_level');
    }

    public function getInstType(): ?string
    {
        return $this->getDataByKey('inst_type');
    }
}
