<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseArrayTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class PlatformAddressTypeFilter extends BaseArrayTypeFilter
{
    public function field(): string
    {
        return 'platform';
    }

    public function arrayRule(): array
    {
        return ['required', 'string'];
    }

    public function customItemMessage(): array
    {
        return [];
    }
}
