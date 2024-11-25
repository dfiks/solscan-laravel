<?php

namespace DFiks\Solscan\Core\Filters;

use ReflectionClass;
use Symfony\Component\Finder\Finder;

class FilterRegistry
{
    public static function getFilters(): array
    {
        $filtersDirectory = __DIR__.'/Available';
        $namespace = 'DFiks\\Solscan\\Core\\Filters\\Available';
        $filters = [];

        $finder = new Finder;
        $finder->files()->in($filtersDirectory)->name('*.php');

        foreach ($finder as $file) {
            $className = $namespace.'\\'.str_replace('.php', '', $file->getFilename());

            if (class_exists($className) && method_exists($className, 'field')) {
                $reflection = new ReflectionClass($className);

                $instance = $reflection->newInstanceWithoutConstructor();
                $field = $instance->field();

                $filters[$field] = $className;
            }
        }

        return $filters;
    }
}
