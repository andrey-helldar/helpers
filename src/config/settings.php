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
            'webhook' => env('SLACK_WEBHOOK_LOGS'),
            'channel' => null,
        ],
    ],
];
