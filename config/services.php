<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // 'google' => [
    //     'client_id' => '805393443290-mnv2bee50bde9o28er1uatk9f9sjm4mo.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    // ],

    // production
    'google' => [
        'client_id' => '805393443290-mnv2bee50bde9o28er1uatk9f9sjm4mo.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://readus.social/auth/google/callback',
    ],

];