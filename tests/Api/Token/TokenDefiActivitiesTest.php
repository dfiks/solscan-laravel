<?php

namespace DFiks\Solscan\Tests\Api\Token;

use DFiks\Solscan\Core\Enums\Methods\TokenMethod;
use DFiks\Solscan\Schemes\Token\Collections\TokenDefiActivitesSchemaCollection;
use DFiks\Solscan\Schemes\Token\TokenDefiActivitiesSchema;

class TokenDefiActivitiesTest extends TokenCase
{
    public function method(): TokenMethod
    {
        return TokenMethod::DefiActivities;
    }

    public function methodOptions(): array
    {
        return [
            'address' => $this->defaultAccount,
        ];
    }

    public function schemaCollection(): string
    {
        return TokenDefiActivitesSchemaCollection::class;
    }

    public function schemaItem(): string
    {
        return TokenDefiActivitiesSchema::class;
    }
}
