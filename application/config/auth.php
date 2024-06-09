<?php

return [
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'committee' => [
            'driver' => 'session',
            'provider' => 'committees',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'committees' => [
            'driver' => 'eloquent',
            'model' => App\Models\Committee::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
        ],
        'committees' => [
            'provider' => 'committees',
            'table' => 'comittee_password_reset_tokens',
            'expire' => 60,
        ],
    ],

];
