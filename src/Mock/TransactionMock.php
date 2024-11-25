<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\TransactionApi;
use DFiks\Solscan\Core\Enums\Methods\TransactionMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class TransactionMock
{
    public static function fake(): void
    {
        $methods = TransactionMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, TransactionApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
