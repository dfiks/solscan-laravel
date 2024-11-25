<?php

namespace DFiks\Solscan\Core\Requests;

use DFiks\Solscan\Core\Contracts\SolscanFilterContract;

/**
 * @template T of SolscanFilterContract
 */
class MethodFilter
{
    /**
     * @var array<T>
     */
    public array $filters;

    /**
     * @param  T  ...$filters
     */
    public function __construct(...$filters)
    {
        $this->filters = $filters;
    }

    /**
     * @param  T  ...$filters
     */
    public static function use(...$filters): static
    {
        return new static(...$filters);
    }

    /**
     * @return array<T>
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
