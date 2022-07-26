<?php

namespace SYSOTEL\APP\IAMConnector\Support;

class AppUserDetails
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected string $email,
        protected string $mobile,
    ){}
}
