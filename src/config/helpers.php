<?php

return [
    'notify' => [
        'slack' => [
            'webhook' => env('SLACK_WEBHOOK_LOGS'),
        ],
    ],
];
