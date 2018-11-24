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
        'client_id' => 'XXXXXXXXXXXXXX',
        'client_secret' => 'XXXXXXXXXXXXXX',
        'redirect' =>  'http://chanchal.com/login/linkedin/callback' 
    ],

    'github' => [
        'client_id' => 'XXXXXXXXXXXXXX',
        'client_secret' => 'XXXXXXXXXXXXXXXXXX',
        'redirect' => 'http://chanchal.com/login/github/callback',
    ],
    
    'google' => [
        'client_id' => 'XXXXXXXXXXXXXXXXXXX' ,
        'client_secret' => 'XXXXXXXXXXXXXXXXXXX' ,
        'redirect' => 'http://chanchal.com/login/google/callback'
    ],

];
