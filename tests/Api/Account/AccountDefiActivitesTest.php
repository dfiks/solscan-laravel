<?php

namespace DFiks\Solscan\Tests\Api\Account;

use DFiks\Solscan\Core\Enums\AccountMethod;
use DFiks\Solscan\Schemes\Account\Collections\DefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Account\DefiActivitesSchema;

class AccountDefiActivitesTest extends AccountCase
{
    public function method(): AccountMethod
    {
        return AccountMethod::DefiActivities;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return DefiActivitesSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return DefiActivitesSchema::class;
    }
}
