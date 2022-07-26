<?php

namespace SYSOTEL\APP\IAMConnector;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PermissionDeniedException extends HttpException
{
    public function __construct(int $statusCode = 403, string $message = '', \Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
