<?php

namespace SYSOTEL\APP\IAMConnector\Support;

class AppUserDetails
{
    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $mobile
     */
    public function __construct(
        protected int $id,
        protected string $name,
        protected string $email,
        protected string $mobile,
    ){}

    /**
     * @param array $array
     * @return AppUserDetails
     */
    public static function createFromArray(array $array): AppUserDetails
    {
        return new self(
            $array['id'],
            $array['fullName'],
            $array['email'],
            $array['mobile'] ?? null,
        );
    }
}
