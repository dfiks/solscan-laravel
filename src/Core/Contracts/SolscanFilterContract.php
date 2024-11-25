<?php

namespace DFiks\Solscan\Core\Contracts;

/**
 * @template TQuery
 * @template TValue
 */
interface SolscanFilterContract
{
    /**
     * @param  TValue  $value
     * @return SolscanFilterContract<TQuery, TValue>
     */
    public static function apply(mixed $value): SolscanFilterContract;

    /**
     * @return TQuery
     */
    public function execute(): mixed;

    public function rules(): array;

    public function handle(): mixed;

    public function messages(): array;
}
