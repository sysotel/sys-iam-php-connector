<?php

namespace SYSOTEL\APP\IAMConnector;


use SYSOTEL\APP\IAMConnector\Enum\AdminPermissionSymbol;

class AdminPermissions
{
    public function __construct(
        public int                   $id,
        public string                $name,
        public string                $description,
        public AdminPermissionSymbol $symbol,
    )
    {
    }

}
