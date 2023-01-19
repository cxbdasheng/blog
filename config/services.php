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
    'qq' => [
        'client_id' => env('QQ_KEY'),
        'client_secret' => env('QQ_SECRET'),
        'redirect' => env('APP_URL') . '/auth/oauth/handleProviderCallback/qq'
    ],
    'github' => [
        'client_id' => env('GITHUB_KEY'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('APP_URL') . '/auth/oauth/handleProviderCallback/github'
    ],
    'weibo' => [
        'client_id' => env('WEIBO_KEY'),
        'client_secret' => env('WEIBO_SECRET'),
        'redirect' => env('APP_URL') . '/auth/oauth/handleProviderCallback/weibo'
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('APP_URL') . '/auth/oauth/handleProviderCallback/goole'
    ],
    'tencent_cloud' => [
        'secret_id' => env('TENCENT_CLOUD_SECRET_ID'),
        'secret_key' => env('TENCENT_CLOUD_SECRET_KEY'),
        'region' => env('TENCENT_CLOUD_REGION'),
        'project_id' => env('TENCENT_CLOUD_PROJECT_ID'), // https://cloud.tencent.com/document/api/551/15615#.E5.9C.B0.E5.9F.9F.E5.88.97.E8.A1.A8
        'instance_id' => env('TENCENT_CLOUD_INSTANCE_ID'),
        'ssh_key_id' => env('TENCENT_CLOUD_SSH_KEY_ID'),
        'image_id' => env('TENCENT_CLOUD_IMAGE_ID'),
        'host_name' => env('TENCENT_CLOUD_HOST_NAME', 'development'),
    ],
    'youpai' => [
        'host' => '',
        'bucket' => '',
        'username' => '',
        'password' => '',
    ]
];
