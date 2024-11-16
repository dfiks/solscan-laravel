<?php

namespace DFiks\Solscan\Api;

use DFiks\Solscan\Core\Enums\AccountMethod;
use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\TokenType;
use DFiks\Solscan\Core\Exceptions\SolscanAuthenticationFailed;
use DFiks\Solscan\Core\Exceptions\SolscanInternalServerError;
use DFiks\Solscan\Core\Exceptions\SolscanTooManyRequests;
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
     * @param  ?array<ActivitySplType>  $activityTypes
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function transfer(
        string $address,
        ?array $activityTypes = null,
        ?string $tokenAccount = null,
        ?string $from = null,
        ?string $to = null,
        ?string $token = null,
        ?array $amount = null,
        ?array $blockTime = null,
        ?bool $excludeAmountZero = null,
        ?string $flow = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $sortBy = 'block_time',
        ?string $sortOrder = 'desc',
    ): TransferSchemaCollection {
        return new TransferSchemaCollection(
            $this->request->send(AccountMethod::Transfer, [
                'address' => $address,
                'activity_type' => $activityTypes,
                'token_account' => $tokenAccount,
                'from' => $from,
                'to' => $to,
                'token' => $token,
                'amount' => $amount,
                'block_time' => $blockTime,
                'exclude_amount_zero' => $excludeAmountZero,
                'flow' => $flow,
                'page' => $page,
                'page_size' => $pageSize,
                'sort_by' => $sortBy,
                'sort_order' => $sortOrder,
            ])
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function tokenAccounts(
        string $address,
        TokenType $tokenType = TokenType::Token,
        int $page = 1,
        int $pageSize = 10,
        bool $hideZero = false,
    ): TokenAccountsSchemaCollection {
        return new TokenAccountsSchemaCollection(
            $this->request->send(AccountMethod::TokenAccounts, [
                'address' => $address,
                'type' => $tokenType,
                'page' => $page,
                'page_size' => $pageSize,
                'hide_zero' => $hideZero,
            ])
        );
    }

    /**
     * @param  ?array<ActivitySplType>  $activityTypes
     *
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function defiActivities(
        string $address,
        ?array $activityTypes = null,
        ?string $from = null,
        ?array $platformAddresses = null,
        ?array $sourceAddresses = null,
        ?string $tokenAddress = null,
        ?array $blockTimes = null,
        ?int $page = 1,
        ?int $pageSize = 10,
        ?string $sortBy = 'block_time',
        ?string $sortOrder = 'desc',
    ): DefiActivitesSchemaCollection {
        return new DefiActivitesSchemaCollection(
            $this->request->send(AccountMethod::DefiActivities, [
                'address' => $address,
                'activity_type' => $activityTypes,
                'from' => $from,
                'platform' => $platformAddresses,
                'source' => $sourceAddresses,
                'token' => $tokenAddress,
                'block_time' => $blockTimes,
                'page' => $page,
                'page_size' => $pageSize,
                'sort_by' => $sortBy,
                'sort_order' => $sortOrder,
            ])
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function balanceChangeActivities(
        string $address,
        ?string $token = null,
        ?array $blockTime = null,
        int $page = 1,
        int $pageSize = 10,
        ?bool $removeSpam = null,
        ?array $amount = null,
        ?string $flow = null,
        ?string $sortBy = 'block_time',
        ?string $sortOrder = 'desc',
    ): BalanceChangeActivitiesSchemaCollection {
        return new BalanceChangeActivitiesSchemaCollection(
            $this->request->send(AccountMethod::BalanceChangeActivities, [
                'address' => $address,
                'token' => $token,
                'block_time' => $blockTime,
                'page' => $page,
                'page_size' => $pageSize,
                'remove_spam' => $removeSpam,
                'amount' => $amount,
                'flow' => $flow,
                'sort_by' => $sortBy,
                'sort_order' => $sortOrder,
            ])
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function transactions(
        string $address,
        ?string $before = null,
        ?int $limit = 10
    ): TransactionsSchemaCollection {
        return new TransactionsSchemaCollection(
            $this->request->send(AccountMethod::Transactions, [
                'address' => $address,
                'before' => $before,
                'limit' => $limit,
            ])
        );
    }

    /**
     * @throws ConnectionException
     * @throws SolscanAuthenticationFailed
     * @throws SolscanInternalServerError
     * @throws SolscanTooManyRequests
     */
    public function stake(
        string $address,
        ?int $page = 1,
        int $pageSize = 10,
    ): StakeSchemaCollection {
        return new StakeSchemaCollection(
            $this->request->send(AccountMethod::Stake, [
                'address' => $address,
                'page' => $page,
                'page_size' => $pageSize,
            ])
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
            ])
        );
    }
}
