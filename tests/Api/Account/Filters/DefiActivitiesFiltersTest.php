<?php

namespace DFiks\Solscan\Tests\Api\Account\Filters;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\SortByType;
use DFiks\Solscan\Core\Enums\SortOrderType;
use DFiks\Solscan\Core\Filters\Available\ActivityTypeFilter;
use DFiks\Solscan\Core\Filters\Available\BlockTimeRangeTypeFilter;
use DFiks\Solscan\Core\Filters\Available\FromAddressFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\PlatformAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\SortByFilter;
use DFiks\Solscan\Core\Filters\Available\SortOrderFilter;
use DFiks\Solscan\Core\Filters\Available\SourceAddressTypeFilter;
use DFiks\Solscan\Core\Filters\Available\TokenAddressFilter;
use DFiks\Solscan\Core\Requests\MethodFilter;
use DFiks\Solscan\Facades\Solscan;
use DFiks\Solscan\Schemes\Account\Collections\DefiActivitesSchemaCollection;
use DFiks\Solscan\Tests\TestCase;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;

class DefiActivitiesFiltersTest extends TestCase
{
    private const EXAMPLE_ADDRESS = 'DujjhQwW7oqEPRNjv7yHYfhsUhB68uhoESJcuurh6ZZT';

    #[DataProvider('defiActivitiesFiltersProvider')]
    public function testDefiActivities(array|MethodFilter|null $filters, string $expectedQuery): void
    {
        Solscan::fake();

        $response = Solscan::account()->defiActivities(self::EXAMPLE_ADDRESS, $filters);

        $this->assertInstanceOf(DefiActivitesSchemaCollection::class, $response);
        $this->assertStringContainsString($expectedQuery, $response->getRequest()['url']);
    }

    public static function defiActivitiesFiltersProvider(): Generator
    {
        yield 'no_filters' => [
            'filters' => [],
            'expectedQuery' => '',
        ];

        yield 'activity_type_filter' => [
            'filters' => [ActivityTypeFilter::apply([ActivitySplType::Transfer, ActivitySplType::Burn])],
            'expectedQuery' => 'activity_type[]=ACTIVITY_SPL_TRANSFER&activity_type[]=ACTIVITY_SPL_BURN',
        ];

        yield 'from_address_filter' => [
            'filters' => [FromAddressFilter::apply(self::EXAMPLE_ADDRESS)],
            'expectedQuery' => 'from='.self::EXAMPLE_ADDRESS,
        ];

        yield 'platform_filter' => [
            'filters' => [PlatformAddressTypeFilter::apply(['PLATFORM_X'])],
            'expectedQuery' => 'platform[]=PLATFORM_X',
        ];

        yield 'source_filter' => [
            'filters' => [SourceAddressTypeFilter::apply(['SOURCE_Y'])],
            'expectedQuery' => 'source[]=SOURCE_Y',
        ];

        yield 'token_filter' => [
            'filters' => [TokenAddressFilter::apply(self::EXAMPLE_ADDRESS)],
            'expectedQuery' => 'token='.self::EXAMPLE_ADDRESS,
        ];

        yield 'block_time_filter' => [
            'filters' => [BlockTimeRangeTypeFilter::apply([1234567890, 1234567990])],
            'expectedQuery' => 'block_time[]=1234567890&block_time[]=1234567990',
        ];

        yield 'page_filter' => [
            'filters' => [PageFilter::apply(2)],
            'expectedQuery' => 'page=2',
        ];

        yield 'page_size_filter' => [
            'filters' => [PageSizeFilter::apply(50)],
            'expectedQuery' => 'page_size=50',
        ];

        yield 'sort_by_filter' => [
            'filters' => [SortByFilter::apply(SortByType::BlockTime)],
            'expectedQuery' => 'sort_by=block_time',
        ];

        yield 'sort_order_filter' => [
            'filters' => [SortOrderFilter::apply(SortOrderType::Desc)],
            'expectedQuery' => 'sort_order=desc',
        ];
    }
}
