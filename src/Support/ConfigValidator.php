<?php

namespace SYSOTEL\APP\IAMConnector\Support;

class ConfigValidator
{
    /**
     * @param $config
     */
    public static function validate($config): void
    {
        if(!is_array($config)) {
            abort(500, '$config should be an array.' . get_class($config) . ' passed.');
        }

        if(!isset($config['baseUrl'])) {
            abort(500, 'baseUrl not found in config');
        }

        if(!isset($config['auth']['key'])) {
            abort(500, 'auth.key not found in config');
        }
    }
}
