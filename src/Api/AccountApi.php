<?php

namespace DFiks\Solscan\Api;

use DFiks\Solscan\Core\Enums\Methods\AccountMethod;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
use DFiks\Solscan\Core\Filters\Available\ActivityTypeFilter;
use DFiks\Solscan\Core\Filters\Available\AmountRangeTokenAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\BeforeSignatureFilter;
use DFiks\Solscan\Core\Filters\Available\BlockTimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ExcludeAmountZeroTypeFilter;
use DFiks\Solscan\Core\Filters\Available\FlowFilter;
use DFiks\Solscan\Core\Filters\Available\FromAddressFilter;
use DFiks\Solscan\Core\Filters\Available\HideZeroTypeFilter;
use DFiks\Solscan\Core\Filters\Available\LimitFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\PlatformAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\RemoveSpamTypeFilter;
use DFiks\Solscan\Core\Filters\Available\SortByFilter;
use DFiks\Solscan\Core\Filters\Available\SortOrderFilter;
use DFiks\Solscan\Core\Filters\Available\SourceAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ToAddressFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAccountFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAddressFilter;
use DFiks\Solscan\Core\Filters\Available\TokenTypeFilter;
use DFiks\Solscan\Core\Requests\MethodFilter;
use DFiks\Solscan\Schemes\Account\Collections\BalanceChangeActivitiesSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\DefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\StakeSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TokenAccountsSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TransactionsSchemaCollection;
use DFiks\Solscan\Schemes\Account\Collections\TransferSchemaCollection;
use DFiks\Solscan\Schemes\Account\DetailSchema;
use Illuminate\Http\Client\ConnectionException;

class AccountApi extends AbstractSolscanApi
{
    public const string RESOURCE_TYPE = 'account';

    /**
     * @param array{
     *   activity_type?: ActivityTypeFilter,
     *   amount?: AmountRangeTokenAddressTypeFilter,
     *   block_time?: BlockTimeRangeTypeFilter,
     *   exclude_amount_zero?: ExcludeAmountZeroTypeFilter,
     *   flow?: FlowFilter,
     *   from?: FromAddressFilter,
     *   page?: PageFilter,
     *   page_size?: PageSizeFilter,
     *   sort_by?: SortByFilter,
     *   sort_order?: SortOrderFilter,
     *   to?: ToAddressFilter,
     *   token_account?: TokenAccountFilter,
     *   token?: TokenAddressFilter }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function transfer(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TransferSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::Transfer, [
            'address' => $address,
        ]);

        return new TransferSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     type?: TokenTypeFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     hide_zero?: HideZeroTypeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function tokenAccounts(
        string $address,
        MethodFilter|array|null $filters = null,

    ): TokenAccountsSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::TokenAccounts, [
            'address' => $address,
        ]);

        return new TokenAccountsSchemaCollection(
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
    ): DefiActivitesSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::DefiActivities, [
            'address' => $address,
        ]);

        return new DefiActivitesSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     token?: TokenAddressFilter,
     *     block_time?: BlockTimeRangeTypeFilter,
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter,
     *     remove_span: ?RemoveSpamTypeFilter,
     *     amount?: AmountRangeTokenAddressTypeFilter,
     *     flow?: FlowFilter,
     *     sort_by?: SortByFilter,
     *     sort_order?: SortOrderFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function balanceChangeActivities(
        string $address,
        MethodFilter|array|null $filters = null,
    ): BalanceChangeActivitiesSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::BalanceChangeActivities, [
            'address' => $address,
        ]);

        return new BalanceChangeActivitiesSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     before?: BeforeSignatureFilter,
     *     limit?: LimitFilter,
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function transactions(
        string $address,
        MethodFilter|array|null $filters = null,
    ): TransactionsSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::Transactions, [
            'address' => $address,
        ]);

        return new TransactionsSchemaCollection(
            $request->getResponse(),
            $request->getRequest()
        );
    }

    /**
     * @param array{
     *     page?: PageFilter,
     *     page_size?: PageSizeFilter
     * }|MethodFilter|null $filters
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function stake(
        string $address,
        MethodFilter|array|null $filters = null,
    ): StakeSchemaCollection {
        $request = $this->request->appendFilters($filters)->send(AccountMethod::Stake, [
            'address' => $address,
        ]);

        return new StakeSchemaCollection(
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
    public function detail(
        string $address,
    ): DetailSchema {
        return new DetailSchema(
            $this->request->send(AccountMethod::Detail, [
                'address' => $address,
            ])->getResponse()
        );
    }
}
