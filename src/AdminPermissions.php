<?php

namespace SYSOTEL\APP\IAMConnector;


class AdminPermissions
{
    public function __construct(
        public int  $id,
        public string $name,
        public string $description,
        public string $symbol,
    )
    {
    }

}
