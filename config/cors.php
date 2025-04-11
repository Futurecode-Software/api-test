<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],

    'allowed_origins' => [
        'https://lucid-proskuriakova.185-210-93-238.plesk.page'
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['X-Requested-With', 'Content-Type', 'Accept', 'Authorization'],

    'exposed_headers' => [],

    'max_age' => 86400, // 24 hours

    'supports_credentials' => true,
];
