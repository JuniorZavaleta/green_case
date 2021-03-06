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

        $this->send($messenger_message);

        if (array_key_exists('images', $data)) {
            $this->sendImages($receiver, $data['images']);
        }

        return true;
    }

    public function send($message)
    {
        $json_message = json_encode($message);

        $ch = curl_init($this->graph_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_message)
        ]);

        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if (array_key_exists('error', $response)) {
            Log::error($response['error']['message']);
            throw new MessengerApiException($response['error']['message']);
        }
    }

    public function sendImages($receiver, $images)
    {
        $elements = [];

        foreach ($images as $index => $image) {
            $number = $index + 1;
            $elements[] = [
                'title' => "Imagen #{$number}",
                'image_url' => $image->img,
            ];
        }

        $messenger_message = [
            'recipient' => [
                'id' => $receiver,
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements' => $elements,
                    ]
                ]
            ],
        ];

        $this->send($messenger_message);
    }
}
