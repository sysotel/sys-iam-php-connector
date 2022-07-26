<?php

namespace SYSOTEL\APP\IAMConnector\Enum;

use Illuminate\Support\Str;

/**
 * {MODULE}::{FEATURE}:{ACTION}
 */
enum AppPermission: string
{
    case CMS___SPACES___LIST = 'SPACES:LIST';
    case CMS___SPACES___ADD = 'SPACES:ADD';
    case CMS___SPACES___UPDATE = 'SPACES:UPDATE';
    case CMS___SPACES___UPDATE_STATUS = 'SPACES:UPDATE_STATUS';

    /**
     * @return string|void
     */
    public function permission()
    {
        if (Str::startsWith($this->name, 'CMS__')) {
            return "CMS::{$this->value}";
        } else {
            abort(500, 'Unhandled permission');
        }
    }
}
