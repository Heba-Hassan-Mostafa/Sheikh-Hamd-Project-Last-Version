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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '175426881911339',
        'client_secret' =>'a9bfed88b73e0dbe6cac308f4ffd0f46',
        'redirect' =>'https://hamadalhajri.net/callback/facebook',
    ],
    'google' => [
        'client_id' => '519776260770-eo7q6va44t8ph38c0irbq8d8051hrtuu.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://hamadalhajri.net/callback/google',
      ], 

];