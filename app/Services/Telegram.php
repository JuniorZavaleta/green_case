<?php

namespace App\Services;

class TelegramApiException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Inconvenientes con la Api de Telegram.");
    }
}

class Telegram implements MessengerInterface
{
    /**
     * Base url Telegram Api Bot
     * @var string
     */
    protected $base_url;

    /**
     * Set the base url to use on sendMessage
     */
    public function __construct()
    {
        $this->base_url = 'https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN');
    }

    public function sendMessage($receiver, $subject, $view, $data = [])
    {
        $message = view($view)->render();
        $url = "{$this->base_url}/sendMessage?text={$message}&chat_id={$receiver}";
        $result = json_decode(file_get_contents($url), true);

        if (isset($result['ok']) && $result['ok']) {
            return true;
        }

        throw new \TelegramApiException;
    }
}
