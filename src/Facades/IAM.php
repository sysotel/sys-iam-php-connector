<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;
use Psr\Http\Message\ResponseInterface;
use SYSOTEL\APP\IAMConnector\Support\AdminDetails;
use SYSOTEL\APP\IAMConnector\Support\AppUserDetails;

/**
 * @method static AdminDetails adminAuth(string|null $accessToken, null|string $permission = null)
 * @method static AppUserDetails appUserAuth(string|null $accessToken, int $propertyId = null, string $permission = null)
 * @method static mixed syncPropertyDetails(int $propertyId, string $name)
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
