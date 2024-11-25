<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseIntegerTypeFilter;

/**
 * @extends BaseFilter<string>
 */
class PageSizeFilter extends BaseIntegerTypeFilter
{
    public function field(): string
    {
        return 'page_size';
    }
}
