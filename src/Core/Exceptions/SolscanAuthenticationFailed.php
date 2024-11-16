<?php

namespace DFiks\Solscan\Core\Exceptions;

use Exception;

class SolscanAuthenticationFailed extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Incorrect token or token level < 2', 401, $previous);
    }
}
