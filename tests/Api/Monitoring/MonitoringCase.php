<?php

namespace DFiks\Solscan\Tests\Api\Monitoring;

use DFiks\Solscan\Core\Enums\Methods\MonitorMethod;
use DFiks\Solscan\Core\Enums\Methods\NftMethod;
use DFiks\Solscan\Core\Enums\Methods\TransactionMethod;
use DFiks\Solscan\Facades\Solscan;
use DFiks\Solscan\Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class MonitoringCase extends TestCase
{
    protected string $defaultAccount = 'DujjhQwW7oqEPRNjv7yHYfhsUhB68uhoESJcuurh6ZZT';

    protected function setUp(): void
    {
        parent::setUp();

        Solscan::fake();
    }

    abstract public function method(): MonitorMethod;

    abstract public function methodOptions(): ?array;

    abstract public function schemaCollection(): ?string;

    abstract public function schemaItem(): string;

    public function testMonitoring(): void
    {
        $data = Solscan::monitoring()->{Str::camel(Str::replace('/', '_', $this->method()->value))}(...$this->methodOptions());

        if ($this->schemaCollection() !== null) {
            $this->assertInstanceOf($this->schemaCollection(), $data);
            $this->assertInstanceOf($this->schemaItem(), $first = $data->first());

            $this->assertInstanceOf(Collection::class, $data);

            $this->assertNotEmpty($data->toArray());
            $this->assertNotEmpty($first->toArray());
        } else {
            $this->assertInstanceOf($this->schemaItem(), $data);
            $this->assertNotEmpty($data->toArray());
        }
    }
}
