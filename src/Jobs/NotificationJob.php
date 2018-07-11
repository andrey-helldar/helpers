<?php

namespace Helldar\Helpers\Jobs;

use Helldar\Helpers\Support\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $exception;

    public function __construct(Notifications $exception)
    {
        $this->exception = $exception;
    }

    public function handle()
    {
        $this->exception->send();
    }
}
