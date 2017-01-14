<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Google, Facebook, Github and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'github' => [
        'client_id'     => getenv('GITHUB_CLIENT_ID'),
        'client_secret' => getenv('GITHUB_CLIENT_SECRET'),
        'redirect'      => getenv('GITHUB_CLIENT_REDIRECT'),
    ],

    'facebook' => [
        'client_id'     => getenv('FACEBOOK_CLIENT_ID'),
        'client_secret' => getenv('FACEBOOK_CLIENT_SECRET'),
        'redirect'      => getenv('FACEBOOK_CLIENT_REDIRECT'),
    ],

    'bitbucket' => [
        'client_id'     => getenv('BITBUCKET_CLIENT_ID'),
        'client_secret' => getenv('BITBUCKET_CLIENT_SECRET'),
        'redirect'      => getenv('BITBUCKET_CLIENT_REDIRECT'),
    ],

    'google' => [
        'client_id'     => getenv('GOOGLE_CLIENT_ID'),
        'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
        'redirect'      => getenv('GOOGLE_CLIENT_REDIRECT'),
    ],
];