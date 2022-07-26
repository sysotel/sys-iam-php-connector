<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;
use Psr\Http\Message\ResponseInterface;

/**
 * @method static ResponseInterface adminAuth(string|null $accessToken, null|string $permission = null): AdminDetails
 * @method static ResponseInterface appUserAuth(string|null $accessToken, int $propertyId = null, string $permission = null): AppUserDetails
 *
 * @see IAM
 */
class IAM extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'sys-connector.iam';
    }
}
