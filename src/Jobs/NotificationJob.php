<?php

namespace Helldar\Helpers\Jobs;

use Helldar\Helpers\Models\ErrorNotification;
use Helldar\Helpers\Notifications\SlackNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notifiable;

    protected $item;

    public function __construct(ErrorNotification $item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        $this->toMail();
        $this->toSlack();
    }

    /**
     * Route notifications for the Slack channel.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('helpers.notify.slack.webhook');
    }

    /**
     * Notification of code errors in the Slack channel.
     */
    private function toSlack()
    {
        if (!config('helpers.notify.slack.enable')) {
            return;
        }

        $slack = new SlackNotify($this->item->exception, $this->titleForSlack());

        $this->notify($slack);
    }

    /**
     * Notification of code errors in the Email.
     */
    private function toMail()
    {
        app('sneaker')->captureException($this->item->exception);
    }

    private function titleForSlack()
    {
        $server      = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf('*%s | Server - %s | Environment - %s*', $this->item->parent, $server, $environment),
            sprintf('`%s:%s`', $this->item->exception->getFile(), $this->item->exception->getLine()),
        ]);
    }
}
