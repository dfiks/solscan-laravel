<?php

namespace DFiks\Solscan\Tests\Api\Account\Filters;

use DFiks\Solscan\Core\Contracts\SolscanFilterContract;
use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\FlowType;
use DFiks\Solscan\Core\Enums\SortByType;
use DFiks\Solscan\Core\Enums\SortOrderType;
use DFiks\Solscan\Core\Filters\Available\ActivityTypeFilter;
use DFiks\Solscan\Core\Filters\Available\AmountRangeTokenAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\BlockTimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\ExcludeAmountZeroTypeFilter;
use DFiks\Solscan\Core\Filters\Available\FlowFilter;
use DFiks\Solscan\Core\Filters\Available\FromAddressFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\SortByFilter;
use DFiks\Solscan\Core\Filters\Available\SortOrderFilter;
use DFiks\Solscan\Core\Filters\Available\ToAddressFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAccountFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAddressFilter;
use DFiks\Solscan\Facades\Solscan;
use DFiks\Solscan\Tests\TestCase;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;

class TransferFiltersTest extends TestCase
{
    public const string EXAMPLE_ADDRESS = 'DujjhQwW7oqEPRNjv7yHYfhsUhB68uhoESJcuurh6ZZT';

    #[DataProvider('filtersProvider')]
    public function testTransferFilter(SolscanFilterContract $filter, string $filterString, string $expectedQuery): void
    {
        Solscan::fake();

        $response = Solscan::account()->transfer(self::EXAMPLE_ADDRESS, [$filter]);

        $this->assertStringContainsString($expectedQuery, $response->getRequest()['url']);
    }

    #[DataProvider('filtersProvider')]
    public function testTransferFilterWithArray(SolscanFilterContract $filter, string $filterString, string $expectedQuery)
    {
        Solscan::fake();

        $response = Solscan::account()->transfer(self::EXAMPLE_ADDRESS, [
            'activity_type' => [
                'ACTIVITY_SPL_TRANSFER', ActivitySplType::Burn,
            ],
            'token_account' => self::EXAMPLE_ADDRESS,
            'token' => self::EXAMPLE_ADDRESS,
            'amount' => ['123', '321'],
            'from' => 'asf',
            'to' => 'asd',
            'block_time' => [0, 1],
            'exclude_amount_zero' => true,
            'flow' => 'out',
            'page' => 1,
            'page_size' => 100,
            'sort_by' => 'block_time',
            'sort_order' => SortOrderType::Desc,
        ]);

        $this->assertStringContainsString($filterString, $response->getRequest()['url']);
    }

    public static function filtersProvider(): Generator
    {
        yield 'activity_type' => [
            'filter' => ActivityTypeFilter::apply([ActivitySplType::Transfer, ActivitySplType::Burn]),
            'filterString' => 'activity_type',
            'expectedQuery' => 'activity_type[]=ACTIVITY_SPL_TRANSFER&activity_type[]=ACTIVITY_SPL_BURN',
        ];

        yield 'token' => [
            'filter' => TokenAccountFilter::apply(self::EXAMPLE_ADDRESS),
            'filterString' => 'token_account',
            'expectedQuery' => 'token_account='.self::EXAMPLE_ADDRESS,
        ];

        yield 'from_address' => [
            'filter' => FromAddressFilter::apply(self::EXAMPLE_ADDRESS),
            'filterString' => 'from',
            'expectedQuery' => 'from='.self::EXAMPLE_ADDRESS,
        ];

        yield 'to_address' => [
            'filter' => ToAddressFilter::apply(self::EXAMPLE_ADDRESS),
            'filterString' => 'to',
            'expectedQuery' => 'to='.self::EXAMPLE_ADDRESS,
        ];

        yield 'token_account' => [
            'filter' => TokenAccountFilter::apply(self::EXAMPLE_ADDRESS),
            'filterString' => 'token_account',
            'expectedQuery' => 'token_account='.self::EXAMPLE_ADDRESS,
        ];

        yield 'token_address' => [
            'filter' => TokenAddressFilter::apply(self::EXAMPLE_ADDRESS),
            'filterString' => 'token',
            'expectedQuery' => 'token='.self::EXAMPLE_ADDRESS,
        ];

        yield 'amount_rage' => [
            'filter' => AmountRangeTokenAddressTypeFilter::apply([self::EXAMPLE_ADDRESS, self::EXAMPLE_ADDRESS]),
            'filterString' => 'amount',
            'expectedQuery' => 'amount[]='.self::EXAMPLE_ADDRESS.'&amount[]='.self::EXAMPLE_ADDRESS,
        ];

        yield 'block_time' => [
            'filter' => BlockTimeRangeTypeFilter::apply([$t1 = time(), $t2 = time()]),
            'filterString' => 'block_time',
            'expectedQuery' => 'block_time[]='.$t1.'&block_time[]='.$t2,
        ];

        yield 'exclude_amount_zero' => [
            'filter' => ExcludeAmountZeroTypeFilter::apply(false),
            'filterString' => 'exclude_amount_zero',
            'expectedQuery' => 'exclude_amount_zero=',
        ];

        yield 'flow_type' => [
            'filter' => FlowFilter::apply(FlowType::In),
            'filterString' => 'flow',
            'expectedQuery' => 'flow=IN',
        ];

        yield 'page' => [
            'filter' => PageFilter::apply(1),
            'filterString' => 'page',
            'expectedQuery' => 'page=1',
        ];

        yield 'page_size' => [
            'filter' => PageSizeFilter::apply(100),
            'filterString' => 'page_size',
            'expectedQuery' => 'page_size=100',
        ];

        yield 'sort_by' => [
            'filter' => SortByFilter::apply(SortByType::BlockTime),
            'filterString' => 'sort_by',
            'expectedQuery' => 'sort_by=block_time',
        ];

        yield 'sort_order' => [
            'filter' => SortOrderFilter::apply(SortOrderType::Desc),
            'filterString' => 'sort_order',
            'expectedQuery' => 'sort_order=desc',
        ];
    }
}
