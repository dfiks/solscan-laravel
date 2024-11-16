<?php

namespace DFiks\Solscan\Tests;

use DFiks\Solscan\Providers\SolscanServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            SolscanServiceProvider::class,
        ];
    }
}
