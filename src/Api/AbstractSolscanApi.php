<?php

namespace DFiks\Solscan\Api;

use DFiks\Solscan\Core\Contracts\SolscanApiContract;
use DFiks\Solscan\Core\Requests\SolscanRequest;

abstract class AbstractSolscanApi implements SolscanApiContract
{
    public function __construct(
        protected readonly SolscanRequest $request
    ) {
        $this->request->setApi($this);
    }

    public function resource(): string
    {
        return static::RESOURCE_TYPE;
    }
}
