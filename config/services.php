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

    // Add info credentials Socialite FaceBook
    'facebook' => [
        'client_id' => '2152363891695709',
        'client_secret' => '7fb1fd67e916d9de11e732f23a2a513f',
        'redirect' => 'https://vncooky.com/callback/facebook',
    ],

    'google' => [
        'client_id' => '967354760344-m1l02ia3dpjrq3t95t9eb0vn41nopqbi.apps.googleusercontent.com',
        'client_secret' => 'RIp5FiVN0dqIbwpZ15r2DGzD',
        'redirect' => 'https://vncooky.com/callback/google',
    ],
];
