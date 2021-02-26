<?php
namespace NeutronStars\Test;

use NeutronStars\Events\Listener;

class TestListener implements Listener
{
    public function start(StartEvent $event)
    {
        $event->setMessage('Debut des events');
    }

    public function start1(StartEvent $event)
    {
        $event->setMessage('Debut des events de Test');
    }

    public function end(EndEvent $event)
    {
        $event->setMessage('Fin des events');
    }

    public function testEnd(EndEvent $event)
    {
        $event->setMessage('Fin des events 2');
    }
}
