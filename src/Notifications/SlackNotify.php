<?php

namespace Helldar\Helpers\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotify extends Notification
{
    use Queueable;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * @var string
     */
    protected $title;

    /**
     * Create a new notification instance.
     *
     * @param $exception
     * @param $title
     */
    public function __construct($exception, $title)
    {
        $this->exception = $exception;
        $this->title     = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param $notifiable
     *
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage())
            ->error()
            ->content($this->title)
            ->from($this->username(), $this->icon())
            ->to(config('helpers.notify.slack.channel'))
            ->attachment(function (SlackAttachment $attachment) {
                $attachment
                    ->title($this->exception->getMessage())
                    ->content($this->exception->getTraceAsString())
                    ->footer(config('app.name'))
                    ->timestamp(now());
            });
    }

    /**
     * Get username for the port name.
     *
     * @return mixed|string
     */
    private function username()
    {
        if ($username = config('helpers.notify.slack.username')) {
            return $username;
        }

        return request()->getHost();
    }

    /**
     * Get the user icon.
     *
     * @return string|null
     */
    private function icon()
    {
        return config('helpers.notify.slack.icon');
    }
}
