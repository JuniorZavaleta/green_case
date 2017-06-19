<?php

namespace App\Services;

use Log;

class MessengerApiException extends \Exception
{
}

class Messenger implements MessengerInterface
{
    /**
     * Graph url Messenger Api Bot
     * @var string
     */
    protected $graph_url;

    /**
     * Set the graph url to use on sendMessage
     */
    public function __construct()
    {
        $this->graph_url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.env('FACEBOOK_PAGE_TOKEN');
    }

    public function sendMessage($receiver, $subject, $view, $data = [])
    {
        $view = 'notifications.messenger.'.$view;

        $message = view($view, $data)->render();

        $messenger_message = [
            'recipient' => [
                'id' => $receiver,
            ],
            'message' => [
                'text' => $message,
            ],
        ];

        $json_message = json_encode($messenger_message);

        $ch = curl_init($this->graph_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_message)
        ]);

        $response = json_decode(curl_exec($ch), true);

        if (array_key_exists('error', $response)) {
            Log::error($response['error']['message']);
            throw new MessengerApiException($response['error']['message']);
        }

        return true;
    }
}
