<?php

namespace DFiks\Solscan\Api;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
use DFiks\Solscan\Core\Filters\Available\ActivityTypeFilter;
use DFiks\Solscan\Core\Filters\Available\AmountRangeTokenAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\BlockTimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ExcludeAmountZeroTypeFilter;
use DFiks\Solscan\Core\Filters\Available\FromAddressFilter;
use DFiks\Solscan\Core\Filters\Available\LimitFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\PlatformAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ProgramFilter;
use DFiks\Solscan\Core\Filters\Available\SortByFilter;
use DFiks\Solscan\Core\Filters\Available\SortByTokenFilter;
use DFiks\Solscan\Core\Filters\Available\SortOrderFilter;
use DFiks\Solscan\Core\Filters\Available\SourceAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\TimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ToAddressFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAddressFilter;
use DFiks\Solscan\Core\Requests\MethodFilter;
use DFiks\Solscan\Schemes\Token\Collections\TokenDefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenHoldersSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenListSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenMarketsSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenPriceSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenTransferSchemaCollection;
use DFiks\Solscan\Schemes\Token\Collections\TokenTrendingSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenMarketInfoSchema;
use DFiks\Solscan\Schemes\Token\TokenMarketVolumeSchema;
use DFiks\Solscan\Schemes\Token\TokenMetaSchema;
use Illuminate\Http\Client\ConnectionException;

class TokenApi extends AbstractSolscanApi
{
    public const string RESOURCE_TYPE = 'token';

    /**
     * @param array{
     *    activity_type?: ActivityTypeFilter,
     *    from?: FromAddressFilter,
     *    to?: ToAddressFilter,
     *    amount?: AmountRangeTokenAddressTypeFilter,
     *    block_time?: BlockTimeRangeTypeFilter,
     *    exclude_amount_zero?: ExcludeAmountZeroTypeFilter,
     *    page?: PageFilter,
     *    page_size?: PageSizeFilter,
     *    sort_by?: SortByFilter,
     *    sort_order?: SortOrderFilter
     * }|MethodFilter|null $filters
     *
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     * @throws ConnectionException
     */
    public function transfer(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenTransferSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::Transfer, [
            'address' => $address,
        ]);

        return new TokenTransferSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     activity_type?: ActivityTypeFilter,
     *     from?: FromAddressFilter,
     *     platform?: PlatformAddressTypeFilter,
     *     source?: SourceAddressTypeFilter,
     *     token?: TokenAddressFilter,
     *     block_time?: BlockTimeRangeTypeFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     sort_by?: SortByFilter,
     *     sort_order?: SortOrderFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function defiActivities(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenDefiActivitesSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::DefiActivities, [
            'address' => $address,
        ]);

        return new TokenDefiActivitesSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     program?: ProgramFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     sort_by?: string,
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function markets(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenMarketsSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::Markets, [
            'token[]' => $address,
        ]);

        return new TokenMarketsSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function marketInfo(
        string $address
    ): TokenMarketInfoSchema {
        $request = $this->request->send(TokenMethod::MarketInfo, [
            'address' => $address,
        ]);

        return new TokenMarketInfoSchema(
            $request->getResponse() ?? []
        );
    }

    /**
     * @param array{
     *     time?: TimeRangeTypeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function marketVolume(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenMarketVolumeSchema {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::MarketInfo, [
            'address' => $address,
        ]);

        return new TokenMarketVolumeSchema(
            $request->getResponse()['data'] ?? []
        );
    }

    /**
     * @param array{
     *     sort_by?: SortByTokenFilter,
     *     sort_order?: SortOrderFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function list(
        MethodFilter|array|null $filters = null,
    ): TokenListSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::List);

        return new TokenListSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     limit?: LimitFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function trending(
        MethodFilter|array|null $filters = null,
    ): TokenTrendingSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::Trending);

        return new TokenTrendingSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     time?: TimeRangeTypeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function price(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenPriceSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::Price, [
            'address' => $address,
        ]);

        return new TokenPriceSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     from_amount?: string,
     *     to_amount?: string
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function holders(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TokenHoldersSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(TokenMethod::Holders, [
            'address' => $address,
        ]);

        return new TokenHoldersSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function meta(
        string $address
    ): TokenMetaSchema {
        $request = $this->request->send(TokenMethod::Meta, [
            'address' => $address,
        ]);

        return new TokenMetaSchema(
            $request->getResponse()['data'] ?? [],
        );
    }
}
