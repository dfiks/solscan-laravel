<?php

namespace DFiks\Solscan\Schemes;

use DFiks\Solscan\Core\Attributes\ParameterSchema;
use DFiks\Solscan\Core\Contracts\SolscanSchemaContract;
use DFiks\Solscan\Core\Enums\ActivitySplType;
use DFiks\Solscan\Core\Enums\ChangeType;
use DFiks\Solscan\Core\Enums\TransactionStatus;
use DFiks\Solscan\Schemes\Account\Collections\ParsedInstructionsSchemaCollection;
use DFiks\Solscan\Schemes\Account\RoutersSchema;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionNamedType;

abstract class SchemaContract implements SolscanSchemaContract
{
    use WithFaker;

    public function __construct(protected mixed $data = []) {}

    protected function getDataByKey(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public static function fake(): static
    {
        $faker = Factory::create();

        $reflection = new ReflectionClass(static::class);
        $methods = $reflection->getMethods();
        $result = [];

        foreach ($methods as $method) {
            $attributes = $method->getAttributes(ParameterSchema::class);
            if (! empty($attributes)) {
                /** @var ParameterSchema $attributeInstance */
                $attributeInstance = $attributes[0]->newInstance();
                $field = $attributeInstance->field ?? Str::snake(Str::replace('get', '', $method->getName()));

                $returnType = $method->getReturnType();
                if ($returnType instanceof ReflectionNamedType) {
                    $typeName = $returnType->getName();

                    $result[$field] = match ($typeName) {
                        'string' => 'example string',
                        'int' => rand(1, 1000),
                        'float' => rand(1, 1000) / 10,
                        'bool' => (bool) rand(0, 1),
                        'array' => [],

                        'Illuminate\Support\Carbon' => Carbon::now(),

                        'DFiks\Solscan\Core\Enums\ActivitySplType' => $faker->randomElement(ActivitySplType::cases()),
                        'DFiks\Solscan\Core\Enums\TransactionStatus' => $faker->randomElement(TransactionStatus::cases()),
                        'DFiks\Solscan\Core\Enums\ChangeType' => $faker->randomElement(ChangeType::cases()),

                        'DFiks\Solscan\Schemes\Account\RoutersSchema' => RoutersSchema::fake(),
                        'DFiks\Solscan\Schemes\Account\Collections\ParsedInstructionsSchemaCollection' => ParsedInstructionsSchemaCollection::fake(),
                        default => null,
                    };
                }
            }
        }

        return new static($result);
    }
}
