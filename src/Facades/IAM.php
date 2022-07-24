<?php

namespace SYSOTEL\APP\IAMConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see IAM
 */
class IAM extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sys-connector.iam';
    }
}
