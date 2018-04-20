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
    'facebook'=>[
        'client_id' => "1996119753974177",         
        'client_secret' =>"497ccf8199c118af8aa69abfc078db90", 
        'redirect' => 'https://localhost:8000/social/handle/facebook',
    ],
    'google'=>[
        'client_id' => "172457554540-6un5la11o1pqt5223ml6ofk1ib389oat.apps.googleusercontent.com",         
        'client_secret' =>"63l3E4H89VoUcKk0aR1V5Sds", 
        'redirect' => 'http://localhost:8000/social/handle/google',
    ]

];
