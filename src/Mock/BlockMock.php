<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Api\BlockApi;
use DFiks\Solscan\Api\TransactionApi;
use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Core\Enums\Methods\BlockMethod;
use DFiks\Solscan\Core\Enums\Methods\TransactionMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class BlockMock
{
    public static function fake(): void
    {
        $methods = BlockMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, BlockApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
