<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\TokenType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

/**
 * @extends BaseFilter<string>
 */
class TokenTypeFilter extends EnumStringTypeFilter
{
    public function field(): string
    {
        return 'type';
    }

    public static function enum(): string
    {
        return TokenType::class;
    }
}
