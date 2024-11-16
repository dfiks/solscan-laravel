<?php

namespace DFiks\Solscan\Core;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Mock\AccountMock;

class SolscanCore
{
    protected array $mockClasses = [
        AccountMock::class,
    ];

    public function account(): AccountApi
    {
        return app(AccountApi::class);
    }

    public function fake(): void
    {
        foreach ($this->mockClasses as $class) {
            (new $class)->fake();
        }
    }
}
