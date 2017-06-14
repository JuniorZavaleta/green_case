<?php

namespace App\Services;

use Mail as LaravelMailer;
use Illuminate\Mail\Mailable;

class MyMail extends Mailable
{
    public $view;

    public $content;

    public function __construct($view, $subject, $content = [])
    {
        $this->view = 'notifications.email.'.$view;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown($this->view, $this->content);
    }
}

class Mail implements MessengerInterface
{
    public function sendMessage($receiver, $subject, $view, $data = [])
    {
        LaravelMailer::to($receiver)->send(new MyMail($view, $subject, $data));
    }
}
