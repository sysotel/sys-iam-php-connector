<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;
use Psr\Http\Message\ResponseInterface;

/**
 * @method ResponseInterface adminAuth(string|null $accessToken)
 *
 * @see IAM
 */
class IAM extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sys-connector.iam';
    }
}
