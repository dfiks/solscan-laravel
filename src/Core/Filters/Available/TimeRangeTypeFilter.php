<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseArrayTypeFilter;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class TimeRangeTypeFilter extends BaseArrayTypeFilter
{
    public function field(): string
    {
        return 'time';
    }

    public function arrayRule(): array
    {
        return ['required', 'integer', 'min:0', 'max:'.time()];
    }

    public function rules(): array
    {
        return [
            'value' => ['required', 'array', 'min:2', 'size:2'],
            'value.*' => $this->arrayRule(),
        ];
    }

    public function customItemMessage(): array
    {
        return [];
    }
}
