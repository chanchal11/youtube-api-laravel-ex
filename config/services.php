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

    'linkedin' => [
        'client_id' => '81bj4dfjqx9iw8',
        'client_secret' => '9rrdklK079nuJYJ7',
        'redirect' =>  'http://trytube.herokuapp.com/login/linkedin/callback'  // 'http://kinderji.herokuapp.com/auth/linkedin/callback'
    ],

    'github' => [
        'client_id' => 'XXXXXXXXXXXXXX',
        'client_secret' => 'XXXXXXXXXXXXXXXXX',
        'redirect' => 'http://trytube.herokuapp.com/login/github/callback',
    ],
    
    'google' => [
        'client_id' => 'XXXXXXXXXXXXX.apps.googleusercontent.com' ,//'190446442166-7ndtniluob9lhdedni07q316hl7sr85f.apps.googleusercontent.com'
        'client_secret' => 'XXXXXXXXXXX' ,//'px9tqc0fdWvVJGgtBM2yM7Ds'
        'redirect' => 'http://trytube.herokuapp.com/login/google/callback',
        'scope' => 'https://www.googleapis.com/auth/youtube.readonly'
    ],

];
