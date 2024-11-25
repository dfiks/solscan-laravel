<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BooleanStringTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class HideZeroTypeFilter extends BooleanStringTypeFilter
{
    public function field(): string
    {
        return 'hide_zero';
    }
}
