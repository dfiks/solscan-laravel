<?php

namespace DFiks\Solscan\Api;

use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Core\Enums\SortByItemsNftType;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
use DFiks\Solscan\Core\Filters\Available\ActivityNftTypeFilter;
use DFiks\Solscan\Core\Filters\Available\BlockTimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\CollectionFilter;
use DFiks\Solscan\Core\Filters\Available\CurrencyTokenFilter;
use DFiks\Solscan\Core\Filters\Available\FromAddressFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\PriceRangeFilter;
use DFiks\Solscan\Core\Filters\Available\RangeFilter;
use DFiks\Solscan\Core\Filters\Available\SortByNftFilter;
use DFiks\Solscan\Core\Filters\Available\SortOrderFilter;
use DFiks\Solscan\Core\Filters\Available\SourceAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ToAddressFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAddressFilter;
use DFiks\Solscan\Core\Requests\MethodFilter;
use DFiks\Solscan\Schemes\Nft\Collections\NftActivitiesCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftItemsCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftListCollection;
use DFiks\Solscan\Schemes\Nft\Collections\NftNewsCollection;
use Illuminate\Http\Client\ConnectionException;

class NFTApi extends AbstractSolscanApi
{
    public const string RESOURCE_TYPE = 'nft';

    /**
     * @param array{
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter
     * }|MethodFilter|null $filters
     *
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     * @throws ConnectionException
     */
    public function news(
        MethodFilter|array|null $filters = null,
    ): NftNewsCollection {
        $request = $this->request->appendFilters($filters)->send(NftMethod::News, [
            'filter' => 'created_time',
        ]);

        return new NftNewsCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     from?: FromAddressFilter,
     *     to?: ToAddressFilter,
     *     source?: SourceAddressTypeFilter,
     *     activity_type?: ActivityNftTypeFilter,
     *     token?: TokenAddressFilter,
     *     collection?: CollectionFilter,
     *     currency_token?: CurrencyTokenFilter,
     *     price?: PriceRangeFilter,
     *     block_time?: BlockTimeRangeTypeFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function activities(
        MethodFilter|array|null $filters = null,
    ): NftActivitiesCollection {
        $request = $this->request->appendFilters($filters)->send(NftMethod::Activities);

        return new NftActivitiesCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     range?: RangeFilter,
     *     sort_order?: SortOrderFilter,
     *     sort_by?: SortByNftFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     collection?: CollectionFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function list(
        MethodFilter|array|null $filters = null,
    ): NftListCollection {
        $request = $this->request->appendFilters($filters)->send(NftMethod::List);

        return new NftListCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     sort_by?: SortByItemsNftType,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function items(
        string $collectionAddress,
        MethodFilter|array|null $filters = null,
    ): NftItemsCollection {
        $request = $this->request->appendFilters($filters)->send(NftMethod::Items, [
            'collection' => $collectionAddress,
        ]);

        return new NftItemsCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }
}
