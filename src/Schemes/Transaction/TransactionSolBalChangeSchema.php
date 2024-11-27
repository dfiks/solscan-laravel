<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionSolBalChangeSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getAddress(): ?string
    {
        return $this->getDataByKey('address');
    }

    #[ParameterSchema]
    public function getPreBalance(): ?int
    {
        return $this->getDataByKey('pre_balance');
    }

    #[ParameterSchema]
    public function getPostBalance(): ?int
    {
        return $this->getDataByKey('post_balance');
    }

    #[ParameterSchema]
    public function getChangeAmount(): ?int
    {
        return $this->getDataByKey('change_amount');
    }
}
