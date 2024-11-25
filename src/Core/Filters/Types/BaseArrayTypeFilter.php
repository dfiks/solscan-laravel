<?php

namespace DFiks\Solscan\Core\Filters\Types;

use BackedEnum;
use DFiks\Solscan\Core\Filters\BaseFilter;

/**
 * @extends BaseFilter<string>
 */
abstract class BaseArrayTypeFilter extends BaseFilter
{
    abstract public function field(): string;

    abstract public function arrayRule(): array;

    abstract public function customItemMessage(): array;

    public function handle(): string
    {
        $query = '';

        foreach ($this->value as $value) {
            $value = $value instanceof BackedEnum ? $value->value : $value;

            $query .= sprintf('%s[]=%s&', $this->field(), $value);
        }

        return trim($query, '&');
    }

    public function rules(): array
    {
        return [
            'value' => ['required', 'array'],
            'value.*' => $this->arrayRule(),
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => sprintf('Field `%s` is required.', $this->field()),
            'value.array' => sprintf('Field `%s` must be array.', $this->field()),
            'value.*.required' => sprintf('Each value in `%s` is required.', $this->field()),

            ...$this->customItemMessage(),
        ];
    }
}
