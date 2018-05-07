<?php

return [
    'notify' => [
        'slack' => [
            /*
             * Webhook URL.
             * Send your JSON payloads to this URL.
             */

            'webhook' => env('SLACK_WEBHOOK_LOGS'),

            /*
             * Choose the username that this integration will post as.
             *
             * Default, current http host value.
             */

            'username' => env('APP_URL'),

            /*
             * Change the icon that is used for messages from this integration.
             *
             * Default, null.
             */

            'icon' => null,
        ],
    ],
];