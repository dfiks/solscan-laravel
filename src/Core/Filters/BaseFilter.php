<?php

namespace DFiks\Solscan\Core\Filters;

use DFiks\Solscan\Core\Contracts\SolscanFilterContract;
use Illuminate\Support\Facades\Validator;

/**
 * @template TQuery
 * @template TValue
 *
 * @implements SolscanFilterContract<TQuery, TValue>
 */
abstract class BaseFilter implements SolscanFilterContract
{
    protected mixed $value;

    /**
     * @param  TValue  $value
     */
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    /**
     * @param  TValue  $value
     */
    public static function apply(mixed $value): static
    {
        return new static($value);
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * @return TQuery
     */
    abstract public function handle(): mixed;

    public function execute(): mixed
    {
        $this->validate();

        return $this->handle();
    }

    public function messages(): array
    {
        return [];
    }

    protected function validate(): void
    {
        if (method_exists($this, 'rules')) {
            $validator = Validator::make(
                ['value' => $this->value], $this->rules(), $this->messages()
            );

            if ($validator->fails()) {
                throw new \Illuminate\Validation\ValidationException($validator);
            }
        }
    }
}
