<?php

namespace DFiks\Solscan\Core\Attributes;

use Attribute;

#[Attribute]
class ParameterSchema
{
    public function __construct(
        public ?string $field = null
    ) {}
}
