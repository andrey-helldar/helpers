<?php

return [
    'digits' => [
        'short_number' => [
            4 => '',
            7 => 'K',
            10 => 'M',
            13 => 'B',
            16 => 'T+',
        ],
    ],

    'notify' => [
        'slack' => [
            /*
             * @see https://laravel.com/docs/5.6/notifications#slack-notifications
             * @see https://youtu.be/BgpKR9NZ1M4
             */
            'webhook' => env('SLACK_WEBHOOK_LOGS'),
            'channel' => null,
        ],
    ],
];
