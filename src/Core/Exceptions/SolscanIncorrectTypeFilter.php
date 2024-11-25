<?php

namespace DFiks\Solscan\Core\Exceptions;

use Throwable;

class SolscanIncorrectTypeFilter extends \Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Incorrect type for filter', $code, $previous);
    }
}
