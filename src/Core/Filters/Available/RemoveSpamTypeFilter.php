<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\RemoveSpamType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class RemoveSpamTypeFilter extends EnumStringTypeFilter
{
    public function field(): string
    {
        return 'remove_spam';
    }

    public static function enum(): string
    {
        return RemoveSpamType::class;
    }
}
