<?php

namespace DFiks\Solscan\Core\Filters;

use BackedEnum;
use DFiks\Solscan\Core\Contracts\SolscanFilterContract;
use DFiks\Solscan\Core\Filters\Types\EnumStringTypeFilter;

class FilterQueryBuilder
{
    protected array $filters = [];

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function build(): string
    {
        $registry = FilterRegistry::getFilters();
        $filterQuery = [];
        $uniqueFilters = [];

        foreach ($this->filters as $key => $value) {
            if (is_string($key) && array_key_exists($key, $registry)) {
                $filterClass = $registry[$key];
                $filter = $this->createFilter($filterClass, $value);
                $this->processFilterOutput($filter->execute(), $filterQuery, $uniqueFilters);
            } elseif ($value instanceof SolscanFilterContract) {
                $this->processFilterOutput($value->execute(), $filterQuery, $uniqueFilters);
            }
        }

        return $this->buildQueryString($filterQuery);
    }

    protected function processFilterOutput(mixed $output, array &$filterQuery, array &$uniqueFilters): void
    {
        if (is_array($output)) {
            foreach ($output as $item) {
                if (! in_array($item, $uniqueFilters, true)) {
                    $filterQuery[] = $item;
                    $uniqueFilters[] = $item;
                }
            }
        } else {
            if (! in_array($output, $uniqueFilters, true)) {
                $filterQuery[] = $output;
                $uniqueFilters[] = $output;
            }
        }
    }

    protected function createFilter(string $filterClass, mixed $value): SolscanFilterContract
    {
        if (is_subclass_of($filterClass, EnumStringTypeFilter::class)) {
            if (is_string($value)) {
                $enumValue = $this->convertToEnum($filterClass::enum(), $value);

                if ($enumValue === null) {
                    throw new \InvalidArgumentException("Invalid enum value '{$value}' for filter {$filterClass}");
                }

                return new $filterClass($enumValue);
            }
        }

        return new $filterClass($value);
    }

    protected function convertToEnum(string $enumClass, string $value): ?BackedEnum
    {
        return $enumClass::tryFrom(strtoupper($value))
            ?? $enumClass::tryFrom(strtolower($value));
    }

    protected function buildQueryString(array $filterQuery): string
    {
        $query = '?';

        foreach ($filterQuery as $q) {
            $query .= sprintf('%s&', $q);
        }

        return trim($query, '&');
    }
}
