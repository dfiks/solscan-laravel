<?php

namespace DFiks\Solscan\Core;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Api\NFTApi;
use DFiks\Solscan\Api\TokenApi;
use DFiks\Solscan\Api\TransactionApi;
use DFiks\Solscan\Mock\AccountMock;
use DFiks\Solscan\Mock\NftMock;
use DFiks\Solscan\Mock\TokenMock;
use DFiks\Solscan\Mock\TransactionMock;

class SolscanCore
{
    protected array $mockClasses = [
        AccountMock::class,
        TokenMock::class,
        TransactionMock::class,
        NftMock::class,
    ];

    public function account(): AccountApi
    {
        return app(AccountApi::class);
    }

    public function token(): TokenApi
    {
        return app(TokenApi::class);
    }

    public function transaction(): TransactionApi
    {
        return app(TransactionApi::class);
    }

    public function nft(): NFTApi
    {
        return app(NFTApi::class);
    }

    public function fake(): void
    {
        foreach ($this->mockClasses as $class) {
            (new $class)->fake();
        }
    }
}
