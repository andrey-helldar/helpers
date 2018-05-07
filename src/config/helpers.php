<?php

return [
    'notify' => [
        'slack' => [
            'webhook' => env('SLACK_WEBHOOK_LOGS'),
        ],
        'email' => [
            'from' => env('MAIL_FROM_ADDRESS'),
            'to' => env('MAIL_ADMIN_ADDRESS'),
        ],
    ],
];
