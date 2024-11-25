<?php

namespace DFiks\Solscan\Core\Filters\Available;

use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Filters\BaseFilter;
use DFiks\Solscan\Core\Filters\Types\BaseArrayTypeFilter;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends BaseFilter<array{ActivitySplType}>
 */
class ActivityTypeFilter extends BaseArrayTypeFilter
{
    public function field(): string
    {
        return 'activity_type';
    }

    public function arrayRule(): array
    {
        return ['required', new Enum(ActivitySplType::class)];
    }

    public function customItemMessage(): array
    {
        return [
            'value.*.Illuminate\Validation\Rules\Enum' => 'The value in `activity_type` of array must be a valid enumeration element. See: \\'.ActivitySplType::class.'::class.',
        ];
    }
}
