<?php


namespace App;

use App\Session\Session;

class FlashMessages
{
    /**
     * @var array
     */

    private $messages;

    public function hasMessages(): bool
    {
        if (isset($messages)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $message string
     * @param $type string
     * @return void
     */

    public function addMessage(string $message, string $type): void
    {
        $this->messages = ['message' => $message, 'type' => $type];
    }

    /**
     * @return void
     */

    public function getMessages(): void
    {
        $messages = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
    }
}