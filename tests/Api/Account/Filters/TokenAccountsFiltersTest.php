<?php

namespace DFiks\Solscan\Tests\Api\Account\Filters;

use DFiks\Solscan\Core\Enums\TokenType;
use DFiks\Solscan\Core\Filters\Available\HideZeroTypeFilter;
use DFiks\Solscan\Core\Filters\Available\PageFilter;
use DFiks\Solscan\Core\Filters\Available\PageSizeFilter;
use DFiks\Solscan\Core\Filters\Available\TokenTypeFilter;
use DFiks\Solscan\Core\Requests\MethodFilter;
use DFiks\Solscan\Facades\Solscan;
use DFiks\Solscan\Schemes\Account\Collections\TokenAccountsSchemaCollection;
use DFiks\Solscan\Tests\TestCase;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;

class TokenAccountsFiltersTest extends TestCase
{
    private const EXAMPLE_ADDRESS = 'DujjhQwW7oqEPRNjv7yHYfhsUhB68uhoESJcuurh6ZZT';

    #[DataProvider('tokenAccountsFiltersProvider')]
    public function testTokenAccounts(array|MethodFilter|null $filters, string $expectedQuery): void
    {
        Solscan::fake();

        $response = Solscan::account()->tokenAccounts(self::EXAMPLE_ADDRESS, $filters);

        $this->assertInstanceOf(TokenAccountsSchemaCollection::class, $response);
        $this->assertStringContainsString($expectedQuery, $response->getRequest()['url']);
    }

    public static function tokenAccountsFiltersProvider(): Generator
    {
        yield 'no_filters' => [
            'filters' => [],
            'expectedQuery' => '',
        ];

        yield 'page_filter' => [
            'filters' => [PageFilter::apply(2)],
            'expectedQuery' => 'page=2',
        ];

        yield 'page_size_filter' => [
            'filters' => [PageSizeFilter::apply(50)],
            'expectedQuery' => 'page_size=50',
        ];

        yield 'hide_zero_filter' => [
            'filters' => [HideZeroTypeFilter::apply(true)],
            'expectedQuery' => 'hide_zero=1',
        ];

        yield 'combined_filters' => [
            'filters' => [
                TokenTypeFilter::apply(TokenType::Token),
                PageFilter::apply(2),
                PageSizeFilter::apply(50),
                HideZeroTypeFilter::apply(true),
            ],
            'expectedQuery' => 'type=token&page=2&page_size=50&hide_zero=1',
        ];
    }
}
