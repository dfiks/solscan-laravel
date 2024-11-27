<?php

namespace DFiks\Solscan\Schemes\Transaction;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;
use DFiks\Solscan\Schemes\Transaction\Collections\TransactionParsedInstructionsCollection;
use Illuminate\Support\Carbon;

class TransactionDetailSchema extends SchemaContract
{
   public function getBlockId(): ?string
   {
       return $this->getDataByKey('block_id');
   }

   public function getFee(): ?int
   {
       return $this->getDataByKey('fee');
   }

   public function getReward(): array
   {
       return $this->getDataByKey('reward');
   }

   public function getSolBalChange()
   {

   }

   public function getTokenBalChange()
   {

   }

   public function getParsedInstructions()
   {

   }
}
