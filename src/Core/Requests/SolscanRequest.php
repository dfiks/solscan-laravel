<?php

namespace DFiks\Solscan\Core\Requests;

use DFiks\Solscan\Core\Contracts\SolscanApiContract;
use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
use DFiks\Solscan\Core\Filters\FilterQueryBuilder;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class SolscanRequest
{
    public SolscanApiContract $api;

    public ?string $query = null;

    public array $response;

    public array $request;

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function send(SolscanMethodContract $method, array $options = [], ?string $url = null): static
    {
        $request = Http::baseUrl($requestUrl = $url ?? self::getDefaultBaseUrl())
            ->withHeaders($headers = [
                'token' => Config::get('solscan.token'),
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])->get($requestUrlMethod = sprintf('%s/%s%s', $this->api->resource(), $method->value, $this->query), $options);

        $this->assertStatus($request->status());
        $this->response = $request->json();
        $this->request = [
            'url' => $requestUrl.'/'.$requestUrlMethod,
            'headers' => collect($headers)->except(['token'])->toArray(),
        ];

        return $this;
    }

    /**
     * @param  MethodFilter|array|null  $filters
     * @return $this
     */
    public function appendFilters(mixed $filters): static
    {
        if (is_array($filters)) {
            $filters = MethodFilter::use(...$filters);
        }

        $filterQueryBuilder = new FilterQueryBuilder($filters->filters ?? []);
        $this->query = $filterQueryBuilder->build();

        return $this;
    }

    public static function getDefaultBaseUrl(): string
    {
        return sprintf('%s/%s', Config::get('solscan.url'), Config::get('solscan.version'));
    }

    public function setApi(SolscanApiContract $api): void
    {
        $this->api = $api;
    }

    public function assertStatus(int $status): void
    {
        match ($status) {
            401 => throw new SolscanAuthenticationFailed,
            403 => throw new SolscanTooManyRequests,
            500 => throw new SolscanInternalServerError,
            default => null
        };
    }

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getRequest(): array
    {
        return $this->request;
    }
}
