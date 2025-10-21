<?php
return [
    'paths' => ['api/*','sanctum/csrf-cookie','login','logout','register'],
'allowed_origins' => ['http://localhost:5173','http://127.0.0.1:5173','http://[::1]:5173'],
'supports_credentials' => true,


    'allowed_methods' => ['*'],               // preflight/OPTIONS সহ সব মেথড
    'allowed_origins' => [
        'http://localhost:5173',
        'http://127.0.0.1:5173',
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 86400,
    'supports_credentials' => true,           // Sanctum-এর জন্য আবশ্যক
];
