<?php
namespace NeutronStars\Test;

use NeutronStars\Events\Event;

class EndEvent implements Event
{
    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
