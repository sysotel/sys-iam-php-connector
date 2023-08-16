<?php

namespace SYSOTEL\APP\IAMConnector\Support;

class AdminDetails
{
    /**
     * @param int $id
     * @param string $name
     * @param string $email
     *
     */
    public function __construct(
        public int $id,
        public readonly string $name,
        public readonly string $email,
        array $permissions
    ){}

    /**
     * @param array $array
     * @return AdminDetails
     */
    public static function createFromArray(array $array): AdminDetails
    {
        return new self(
            $array['id'],
            $array['fullName'],
            $array['email'],
            $array['permissions']
        );
    }
}
