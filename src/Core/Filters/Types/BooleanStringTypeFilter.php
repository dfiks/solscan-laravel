<?php

namespace DFiks\Solscan\Core\Filters\Types;

use DFiks\Solscan\Core\Filters\BaseFilter;

/**
 * @extends BaseFilter<string>
 */
abstract class BooleanStringTypeFilter extends BaseFilter
{
    abstract public function field(): string;

    public function handle(): string
    {
        return sprintf('%s=%s', $this->field(), (bool) $this->value);
    }

    public function rules(): array
    {
        return [
            'value' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => sprintf('Field `%s` is required.', $this->field()),
        ];
    }
}
