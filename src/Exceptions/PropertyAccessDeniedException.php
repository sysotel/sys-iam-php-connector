<?php

namespace SYSOTEL\APP\IAMConnector;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PropertyAccessException extends HttpException
{
    public function __construct(int $statusCode, string $message = '', \Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
