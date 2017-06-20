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
        $view = 'notifications.telegram.'.$view;
        $message = view($view, $data)->render();

        $url = "{$this->base_url}/sendMessage?chat_id={$receiver}";

        $post_fields = [
            'chat_id' => $receiver,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

        $result = json_decode(curl_exec($ch), true);

        curl_close($ch);

        if (isset($result['ok']) && $result['ok']) {
            if (array_key_exists('images', $data)) {
                foreach ($data['images'] as $image) {
                    $this->sendImage($receiver, $image->img);
                }
            }

            return true;
        }

        throw new TelegramApiException;
    }

    private function getRealPath($image)
    {
        $img_pos = strpos($image, 'img');

        return public_path(substr($image, $img_pos));
    }

    public function sendImage($receiver, $image)
    {
        $url = "{$this->base_url}/sendPhoto?chat_id={$receiver}";

        $post_fields = [
            'chat_id' => $receiver,
            'photo' => new \CURLFile($this->getRealPath($image)),
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $result = curl_exec($ch);

        if (isset($result['ok']) && $result['ok']) {
            return true;
        }

        \Log::error(curl_error($ch));
        throw new TelegramApiException;
    }
}
