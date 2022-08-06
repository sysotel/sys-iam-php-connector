<?php

return [
    'baseUrl' => env('IAM_INTERNAL_API_BASE_URL'),

    'auth' => [
        'headerName' => 'Api-Key',
        'key' => env('IAM_INTERNAL_API_AUTH_KEY')
    ]
];
