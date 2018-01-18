<?php

namespace Helldar\Helpers\Support;

use Illuminate\Session\Store;
use Illuminate\Support\Collection;

/**
 * Flash messages min service for Laravel (only backend).
 *
 * @see https://gist.github.com/Ellrion/7ee8085b35f0de8c6d386255f9dd16bb
 */
class Messages
{
    const OLD_FLASH_LARAVEL_SESSION_ENGINE_KEY = '_flash.old';

    /**
     * @var string
     */
    protected $keyInStorage = '_flash_messages';

    /**
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $messages;

    /**
     * Messages constructor.
     *
     * @param \Illuminate\Session\Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->messages = new Collection();

        $this->ageFlash();
    }

    /**
     * Set specific key for session storage.
     *
     * @param string $key
     */
    public function setStorageKey($key)
    {
        $this->keyInStorage = $key;
    }

    /**
     * Flash an information message.
     *
     * @param string $message
     * @param array  $data
     *
     * @return object
     */
    public function info($message, $data = [])
    {
        return $this->addMessage($message, 'info', $data);
    }

    /**
     * Flash a success message.
     *
     * @param string $message
     * @param array  $data
     *
     * @return object
     */
    public function success($message, $data = [])
    {
        return $this->addMessage($message, 'success', $data);
    }

    /**
     * Flash an error message.
     *
     * @param string $message
     * @param array  $data
     *
     * @return object
     */
    public function error($message, $data = [])
    {
        return $this->addMessage($message, 'danger', $data);
    }

    /**
     * Flash a warning message.
     *
     * @param string $message
     * @param array  $data
     *
     * @return object
     */
    public function warning($message, $data = [])
    {
        return $this->addMessage($message, 'warning', $data);
    }

    /**
     * Flash a general message.
     *
     * @param string $text
     * @param string $level
     * @param array  $data
     *
     * @return object
     */
    protected function addMessage($text, $level = 'info', $data = [])
    {
        $msg_object = (object) array_merge($data, compact('text', 'level'));

        $this->messages->prepend($msg_object);
        $this->flash();

        return $msg_object;
    }

    /**
     * Return collection messages by level or all.
     *
     * @param string|null $level
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getMessages($level = null)
    {
        $this->flushFlash();

        $messages = array_merge(
            $this->session->get($this->keyInStorage, []),
            $this->session->get($this->keyInStorage.'_old', [])
        );

        $messages = (new Collection($messages))
            ->map(function ($message) {
                return (object) $message;
            });

        if (is_null($level)) {
            return $messages;
        }

        return $messages->filter(function ($message) use ($level) {
            return $message->level === $level;
        });
    }

    /**
     * Alias for getMessages method.
     *
     * @param string|null $level
     *
     * @return \Illuminate\Support\Collection
     */
    public function messages($level = null)
    {
        return $this->getMessages($level);
    }

    /**
     * Store current messages to flash session store.
     */
    protected function flash()
    {
        $data = $this->messages
            ->map(function ($message) {
                return (array) $message;
            })
            ->toArray();

        $this->session->flash($this->keyInStorage, $data);
    }

    /**
     * Remove old messages to special message list.
     */
    protected function ageFlash()
    {
        if (!$this->session->has($this->keyInStorage)) {
            return;
        }

        $old_messages = $this->session->pull($this->keyInStorage);
        $key_old = $this->keyInStorage.'_old';

        $this->session->put($key_old, $old_messages);
        $this->session->push(self::OLD_FLASH_LARAVEL_SESSION_ENGINE_KEY, $key_old);
    }

    /**
     * Mark notices as old.
     */
    protected function flushFlash()
    {
        $this->session->push(self::OLD_FLASH_LARAVEL_SESSION_ENGINE_KEY, $this->keyInStorage);
    }
}
