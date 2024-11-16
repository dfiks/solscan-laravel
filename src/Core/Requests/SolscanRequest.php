<?php

namespace DFiks\Solscan\Core\Requests;

use BackedEnum;
use DFiks\Solscan\Core\Contracts\SolscanApiContract;
use DFiks\Solscan\Core\Contracts\SolscanMethodContract;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class SolscanRequest
{
    public SolscanApiContract $api;

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function send(SolscanMethodContract $method, array $options = [], ?string $url = null): ?array
    {
        $options = array_values($options);

        foreach ($options as $key => $option) {
            if ($option instanceof BackedEnum) {
                $options[$key] = $option->value;
            }
        }

        $request = Http::baseUrl($url ?? self::getDefaultBaseUrl())
            ->withHeaders([
                'token' => Config::get('solscan.token'),
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])->get(sprintf('%s/%s', $this->api->resource(), $method->value), $options);

        $this->assertStatus($request->status());

        return $request->json();
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
}
