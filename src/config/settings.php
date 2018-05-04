<?php

return [
    'digits' => [
        'short_number' => [
            4  => '',
            7  => 'K',
            10 => 'M',
            13 => 'B',
            16 => 'T+',
        ],
    ],

    'notify' => [
        /**
         * @see https://youtu.be/BgpKR9NZ1M4
         */
        'slack' => env('SLACK_WEBHOOK_LOGS'),
    ],
];
