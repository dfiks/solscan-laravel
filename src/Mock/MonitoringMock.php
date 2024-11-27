<?php

namespace DFiks\Solscan\Mock;

use DFiks\Solscan\Api\AccountApi;
use DFiks\Solscan\Api\BlockApi;
use DFiks\Solscan\Api\MonitoringApi;
use DFiks\Solscan\Api\TransactionApi;
use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Core\Enums\Methods\BlockMethod;
use DFiks\Solscan\Core\Enums\Methods\MonitorMethod;
use DFiks\Solscan\Core\Enums\Methods\TransactionMethod;
use DFiks\Solscan\Core\Requests\SolscanRequest;
use Illuminate\Support\Facades\Http;

class MonitoringMock
{
    public static function fake(): void
    {
        $methods = MonitorMethod::cases();
        $baseUrl = SolscanRequest::getDefaultBaseUrl();
        $mockedHttp = [];

        foreach ($methods as $method) {

            $key = sprintf('%s/%s/%s*', $baseUrl, MonitoringApi::RESOURCE_TYPE, $method->value);

            $mockedHttp[$key] = Http::response($method->getFakeSchema()?->toArray() ?? []);
        }

        Http::fake($mockedHttp);
    }
}
