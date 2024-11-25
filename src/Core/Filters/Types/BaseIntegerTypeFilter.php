<?php

namespace DFiks\Solscan\Core\Filters\Types;

use DFiks\Solscan\Core\Filters\BaseFilter;

/**
 * @extends BaseFilter<string>
 */
abstract class BaseIntegerTypeFilter extends BaseFilter
{
    abstract public function field(): string;

    public function handle(): string
    {
        return sprintf('%s=%s', $this->field(), (int) $this->value);
    }

    public function rules(): array
    {
        return [
            'value' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => sprintf('Field `%s` is required.', $this->field()),
        ];
    }
}
