<?php

namespace App\Services;

interface MessengerInterface
{
    function sendMessage($receiver, $subject, $view, $data = []);
}
