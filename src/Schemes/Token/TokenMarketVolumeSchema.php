<?php

namespace DFiks\Solscan\Schemes\Token;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Schemes\SchemaContract;

class TokenMarketVolumeSchema extends SchemaContract
{
    #[ParameterSchema]
    public function getPoolAddress(): ?string
    {
        return $this->getDataByKey('pool_address');
    }

    #[ParameterSchema]
    public function getProgramId(): ?string
    {
        return $this->getDataByKey('program_id');
    }

    #[ParameterSchema('total_volume_24h')]
    public function getTotalVolume24h(): ?string
    {
        return $this->getDataByKey('total_volume_24h');
    }

    #[ParameterSchema('total_volume_change_24h')]
    public function getTotalVolumeChange24h(): ?string
    {
        return $this->getDataByKey('total_volume_change_24h');
    }

    #[ParameterSchema('total_trades_24h')]
    public function getTotalTrades24h(): ?string
    {
        return $this->getDataByKey('total_trades_24h');
    }

    #[ParameterSchema('total_trades_change_24h')]
    public function getTotalTradesChange24h(): ?string
    {
        return $this->getDataByKey('total_trades_change_24h');
    }

    /**
     * @return null|array<{day: int, value: int}>
     */
    #[ParameterSchema]
    public function getDays(): ?array
    {
        return $this->getDataByKey('days');
    }
}
