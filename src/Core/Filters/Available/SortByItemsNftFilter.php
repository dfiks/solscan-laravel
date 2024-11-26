<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\SortByItemsNftType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class SortByItemsNftFilter extends EnumStringTypeFilter
{
    public function field(): string
    {
        return 'sort_by';
    }

    public static function enum(): string
    {
        return SortByItemsNftType::class;
    }
}