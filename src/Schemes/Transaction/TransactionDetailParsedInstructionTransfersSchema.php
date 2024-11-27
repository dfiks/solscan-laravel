<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionDetailParsedInstructionTransfersSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getSourceOwner(): ?string
    {
        return $this->getDataByKey('source_owner');
    }

    #[ParameterSchema]
    public function getSource(): ?string
    {
        return $this->getDataByKey('source');
    }

    #[ParameterSchema]
    public function getDestination(): ?string
    {
        return $this->getDataByKey('destination');
    }

    #[ParameterSchema]
    public function getDestinationOwner(): ?string
    {
        return $this->getDataByKey('destination_owner');
    }

    #[ParameterSchema]
    public function getTransferType(): ?string
    {
        return $this->getDataByKey('transfer_type');
    }

    #[ParameterSchema]
    public function getTokenAddress(): ?string
    {
        return $this->getDataByKey('token_address');
    }

    #[ParameterSchema]
    public function getDecimals(): ?int
    {
        return $this->getDataByKey('decimals');
    }

    #[ParameterSchema]
    public function getAmountStr(): ?string
    {
        return $this->getDataByKey('amount_str');
    }

    #[ParameterSchema]
    public function getAmount(): ?int
    {
        return $this->getDataByKey('amount');
    }

    #[ParameterSchema]
    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    #[ParameterSchema]
    public function getOuterProgramId(): ?string
    {
        return $this->getDataByKey('outer_program_id');
    }

    #[ParameterSchema]
    public function getInsIndex(): ?int
    {
        return $this->getDataByKey('ins_index');
    }

    #[ParameterSchema]
    public function getOuterInsIndex(): ?int
    {
        return $this->getDataByKey('outer_ins_index');
    }

    #[ParameterSchema]
    public function getEvent(): ?string
    {
        return $this->getDataByKey('event');
    }

    #[ParameterSchema]
    public function fee(): mixed
    {
        return $this->getDataByKey('fee');
    }
}
