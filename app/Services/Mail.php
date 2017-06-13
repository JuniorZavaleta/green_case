<?php

namespace App\Services;

use Mail as LaravelMailer;

class Mail implements MessengerInterface
{
    public function sendMessage($receiver, $subject, $view, $data = [])
    {
        $view = 'notifications.email.'.$view;
        LaravelMailer::send($view, $data,
            function ($mail) use ($receiver, $subject) {
                $mail->to($receiver)->subject($subject);
            }
        );
    }
}
