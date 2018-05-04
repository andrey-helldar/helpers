<?php

namespace Helldar\Helpers\Notifications;

use Illuminate\Bus\Queueable;
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
    protected $class_name;

    /**
     * @var string
     */
    protected $title;

    /**
     * Create a new notification instance.
     *
     * @param $exception
     * @param $class_name
     * @param $title
     */
    public function __construct($exception, $class_name, $title)
    {
        $this->exception = $exception;
        $this->class_name = $class_name;
        $this->title = $title;
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
            ->attachment(function ($attachment) {
                $content = sprintf("%s\nLine: %s", $this->exception->getFile(), $this->exception->getLine());

                $attachment
                    ->title($this->exception->getMessage())
                    ->content($content);
            });
    }
}