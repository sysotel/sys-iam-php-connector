<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;
use Psr\Http\Message\ResponseInterface;

/**
 * @method static ResponseInterface adminAuth(string|null $accessToken)
 * @method static ResponseInterface appUserAuth(string|null $accessToken)
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
