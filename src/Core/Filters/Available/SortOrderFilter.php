<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\SortOrderType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class SortOrderFilter extends EnumStringTypeFilter
{
    public function field(): string
    {
        return 'sort_order';
    }

    public static function enum(): string
    {
        return SortOrderType::class;
    }
}
