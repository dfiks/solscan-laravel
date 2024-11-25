<?php

namespace DFiks\Solscan\Core\Filters\Types;

use DFiks\Solscan\Core\Filters\BaseFilter;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends BaseFilter<string>
 */
abstract class EnumStringTypeFilter extends BaseFilter
{
    abstract public function field(): string;

    abstract public static function enum(): string;

    public function handle(): string
    {
        return sprintf('%s=%s', $this->field(), $this->value->value);
    }

    public function rules(): array
    {
        return [
            'value' => ['required', new Enum(static::enum())],
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => sprintf('Field `%s` is required.', $this->field()),
            'value.Illuminate\Validation\Rules\Enum' => sprintf('The value in `%s` must be a valid enumeration element. See: \\'.static::enum().'.', static::enum()),
        ];
    }
}
