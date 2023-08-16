<?php

namespace SYSOTEL\APP\IAMConnector;


use SYSOTEL\APP\IAMConnector\Enum\AdminPermissionSymbol;

class AdminUserDetails
{
    protected int $id;
    protected string $name;
    protected string $email;

    /**
     * @var AdminPermissions[]
     */
    protected array $permissions;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }


    public function hasPermission(AdminPermissionSymbol $permissionSymbol): bool
    {
        foreach ($this->permissions as $permission) {
            if ($permission->symbol === $permissionSymbol) {
                return true;
            }
        }

        return false;
    }

    public function hasAllPermissions(array $permissionSymbols): bool
    {
        foreach ($permissionSymbols as $symbol) {
            foreach ($this->permissions as $permission) {
                if ($permission->symbol !== $symbol) {
                    return false;
                }
            }
        }

        return true;
    }

    public function hasAnyPermission(array $permissionSymbols): bool
    {
        foreach ($permissionSymbols as $symbol) {
            foreach ($this->permissions as $permission) {
                if ($permission->symbol === $symbol) {
                    return true;
                }
            }
        }

        return false;
    }

}