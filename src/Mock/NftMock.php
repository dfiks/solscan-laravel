<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\NFTApi;
use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class NftMock
{
    public static function fake(): void
    {
        $methods = NftMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, NFTApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
