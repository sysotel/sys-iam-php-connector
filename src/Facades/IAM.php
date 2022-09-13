<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;
use Psr\Http\Message\ResponseInterface;
use SYSOTEL\APP\IAMConnector\Support\AdminDetails;
use SYSOTEL\APP\IAMConnector\Support\ExtranetUserDetails;

/**
 * @method static AdminDetails adminAuth(string|null $accessToken, null|string $permission = null)
 * @method static ExtranetUserDetails extranetUserAuth(string|null $accessToken, int $propertyId = null, string $permission = null)
 * @method static mixed syncPropertyDetails(int $propertyId, string $name)
 * @method static mixed getPropertiesForUser(int $userId)
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
