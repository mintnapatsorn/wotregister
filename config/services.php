<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),         // Your Facebook Client ID
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'), // Your Facebook Client Secret
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],

    'mecas' => [
        'client_id' => env('MECAS_CLIENT_ID'),         // Your Facebook Client ID
        'client_secret' => env('MECAS_CLIENT_SECRET'), // Your Facebook Client Secret
        'redirect' => env('MECAS_REDIRECT'),
    ],

    'boxbox' => [
        'client_id' => env('AUTH_CLIENT_ID'),         // Your Boxbox Client ID
        'client_secret' => env('AUTH_CLIENT_SECRET'), // Your Boxbox Client Secret
        'redirect' => env('AUTH_REDIRECT'),
    ],

    'opendistro' => [
        'client_id' => env('OPENDISTRO_CLIENT_ID'),         // Your OpenDistro Client ID
        'client_secret' => env('OPENDISTRO_CLIENT_SECRET'), // Your OpenDistro Client Secret
        'redirect' => env('OPENDISTRO_REDIRECT'),
    ],

];
