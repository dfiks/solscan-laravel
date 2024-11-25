<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class AccountMock
{
    public static function fake(): void
    {
        $methods = AccountMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, AccountApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
