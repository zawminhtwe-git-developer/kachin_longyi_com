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
    'google' => [
        'client_id' =>"929633289252-42k3m1hlhgcd5tf4et5rr5e021ahs8u1.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '701129567966301',
        'client_secret' => 'b0c80ede51db96dd2d4f69cad91f8ca0',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect'      => env('APP_URL') . '/oauth/github/callback',
    ],

];
