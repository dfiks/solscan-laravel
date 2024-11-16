<?php

namespace DFiks\Solscan\Schemes;

use DFiks\Solscan\Core\Contracts\SolscanSchemaContract;
use Illuminate\Support\Collection;

/**
 * @template T of SchemaContract
 *
 * @extends Collection<int, T>
 */
abstract class SchemaCollectionContract extends Collection implements SolscanSchemaContract
{
    protected array $originalResponse;

    public function __construct(array $response)
    {
        $this->originalResponse = $response;

        $items = array_map(
            fn ($item) => new ($this->schema())($item),
            $response['data'] ?? []
        );

        parent::__construct($items);
    }

    /**
     * @return class-string<T>
     */
    abstract protected function schema(): string;

    public function isSuccess(): bool
    {
        return $this->originalResponse['success'] ?? false;
    }

    public function getErrorCode(): int
    {
        return $this->originalResponse['errors']['code'] ?? 0;
    }

    public function getErrorMessage(): ?string
    {
        return $this->originalResponse['errors']['message'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'success' => $this->isSuccess(),
            'data' => $this->originalResponse['data'] ?? [],
        ];
    }

    public static function fake(int $count = 5): static
    {
        $schemaClass = (new static([]))->schema();

        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = $schemaClass::fake()->toArray();
        }

        return new static([
            'success' => true,
            'data' => $items,
        ]);
    }

    /**
     * @param  int  $key
     * @return ?T
     */
    public function offsetGet($key): mixed
    {
        $item = parent::offsetGet($key);

        if ($item instanceof SchemaContract) {
            return $item;
        }

        return null;
    }
}
