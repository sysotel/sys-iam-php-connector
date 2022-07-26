<?php

namespace SYSOTEL\APP\IAMConnector\Enums;

use Illuminate\Support\Str;

/**
 * {MODULE}::{FEATURE}:{ACTION}
 */
enum AppPermission: string
{
    case CMS___SPACES___LIST = 'CMS::SPACES:LIST';
    case CMS___SPACES___ADD = 'CMS::SPACES:ADD';
    case CMS___SPACES___UPDATE = 'CMS::SPACES:UPDATE';
    case CMS___SPACES___UPDATE_STATUS = 'CMS::SPACES:UPDATE_STATUS';

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
