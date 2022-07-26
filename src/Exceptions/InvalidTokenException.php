<?php

namespace SYSOTEL\APP\IAMConnector;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidTokenException extends HttpException
{
    public function __construct(int $statusCode = 401, string $message = '', \Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
