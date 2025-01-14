<?php

return [

    /*
    |----------------------------------------------------------------------
    | Authentication Defaults
    |----------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Este guard pode ser 'web' ou 'api' dependendo da sua necessidade
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |----------------------------------------------------------------------
    | Authentication Guards
    |----------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | This includes the guard for the web and API authentication.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Configuração para o guard 'api' com Passport
        'api' => [
            'driver' => 'passport',  // Alterado para 'passport' para usar tokens de autenticação
            'provider' => 'users',
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | User Providers
    |----------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Modelo correto para usuários
            'table' => 'users', // Utiliza a tabela 'users' para os usuários
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Resetting Passwords
    |----------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Password Confirmation Timeout
    |----------------------------------------------------------------------
    |
    | Define the amount of seconds before a password confirmation window
    | expires and users are asked to re-enter their password.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
