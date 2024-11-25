<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseStringTypeFilter;

/**
 * @extends BaseFilter<string>
 */
class TokenAccountFilter extends BaseStringTypeFilter
{
    public function field(): string
    {
        return 'token_account';
    }
}
