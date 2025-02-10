<?php

return [

    'default' => env('BROADCAST_DRIVER', 'null'),

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('5d42f11d94cd2431176c'),
            'secret' => env('8de0de8dc05e341e3ecd'),
            'app_id' => env('1874635'),
            'options' => [
                'cluster' => env('mt1'),
                'useTLS' => true,
            ],
        ],

        'null' => [
            'driver' => 'null',
        ],

        // You can add more connections here (e.g., Redis, Database, etc.)
    ],

];
