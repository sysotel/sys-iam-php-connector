<?php

namespace SYSOTEL\APP\IAMConnector\Support;

class ExtranetUserDetails
{
    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param ?string $mobile
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $mobile,
    ){}

    /**
     * @param array $array
     * @return ExtranetUserDetails
     */
    public static function createFromArray(array $array): ExtranetUserDetails
    {
        return new self(
            $array['id'],
            $array['fullName'],
            $array['email'],
            $array['mobile'] ?? null,
        );
    }
}
