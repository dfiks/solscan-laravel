<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\FlowType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

/**
 * @extends BaseFilter<string>
 */
class FlowFilter extends EnumStringTypeFilter
{
    public function field(): string
    {
        return 'flow';
    }

    public static function enum(): string
    {
        return FlowType::class;
    }
}
