<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseArrayTypeFilter;

/**
 * @extends BaseFilter<array>
 */
class ProgramFilter extends BaseArrayTypeFilter
{
    public function field(): string
    {
        return 'program';
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