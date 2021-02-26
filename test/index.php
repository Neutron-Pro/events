<?php
use NeutronStars\Events\Events;
use NeutronStars\Test\EndEvent;
use NeutronStars\Test\StartEvent;
use NeutronStars\Test\TestListener;

require_once '../vendor/autoload.php';

$events = new Events();

$listener = new TestListener();
$events->register('start', $listener, 'start')
       ->register('end', $listener, 'end');

$startEvent = new StartEvent('Test des events start');
echo $startEvent->getMessage();
$events->call('start', $startEvent);
echo '<br />';
echo $startEvent->getMessage();

echo '<hr>';
$endEvent = new EndEvent('Tes des events de fin');
echo $endEvent->getMessage();
$events->call('end', $endEvent);
echo '<br />';
echo $endEvent->getMessage();

echo '<hr>';

$events = new Events();
$events->registers(
    ['start', 'NeutronStars\Test\TestListener#start'],
    ['end', 'NeutronStars\Test\TestListener#end']
);
$startEvent = new StartEvent('Test des events start');
echo $startEvent->getMessage();
$events->call('start', $startEvent);
echo '<br />';
echo $startEvent->getMessage();

echo '<hr>';
$endEvent = new EndEvent('Tes des events de fin');
echo $endEvent->getMessage();
$events->call('end', $endEvent);
echo '<br />';
echo $endEvent->getMessage();
