<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\TokenApi;
use DFiks\Solscan\Core\Enums\TokenMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class TokenMock
{
    public static function fake(): void
    {
        $methods = TokenMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, TokenApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
