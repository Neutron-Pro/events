<?php
namespace NeutronStars\Test;

use NeutronStars\Events\Listener;

class TestListener implements Listener
{
    public function start(StartEvent $event) {
        $event->setMessage('Debut des events');
    }

    public function end(EndEvent $event) {
        $event->setMessage('Fin des events');
    }
}
