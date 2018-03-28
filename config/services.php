


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
                'client_id' => '117188562389440',
                'client_secret' =>'812c65f1c29424a6b2d230f02f583867',
                'redirect' => 'http://balticoin.dsss.in/callback/facebook'
        ],
        'google' => [ 
                'client_id' => env ( 'G+_CLIENT_ID' ),
                'client_secret' => env ( 'G+_CLIENT_SECRET' ),
                'redirect' => env ( 'G+_REDIRECT' ) 
        ],
        'twitter' => [ 
                
                'client_id' => 'PhH7mn4f4sFdqQukpogvvdY3S',
                'client_secret' => 'UEIb2Ih7RvrVaOMc5ISL2SLzoBV0Ev7lhumuY4IIGGOZwFVdWq',
                'redirect' =>  'http://balticoin.dsss.in/callback/twitter' 
        ],
        'github' => [ 
                
                'client_id' => env ( 'GITHUB_CLIENT_ID' ),
                'client_secret' => env ( 'GITHUB_CLIENT_SECRET' ),
                'redirect' => env ( 'GITHUB_REDIRECT' ) 
        ] 


];

