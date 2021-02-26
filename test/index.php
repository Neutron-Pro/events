<?php
use NeutronStars\Events\Events;
use NeutronStars\Test\EndEvent;
use NeutronStars\Test\StartEvent;
use NeutronStars\Test\TestListener;

require_once '../vendor/autoload.php';

$events = new Events();

$listener = new TestListener();
$events->register('project.start', $listener, 'start')
       ->register('project.end', $listener, 'end')
       ->register('project.end', $listener, 'testEnd')
       ->register('project.start', $listener, 'start1');

$startEvent = new StartEvent('Test des events start');
echo $startEvent->getMessage();
$events->call('project.start', $startEvent);
echo '<br />';
echo $startEvent->getMessage();

echo '<hr>';
$endEvent = new EndEvent('Test des events de fin');
echo $endEvent->getMessage();
$events->call('project.end', $endEvent);
echo '<br />';
echo $endEvent->getMessage();

echo '<hr>';

$events = new Events();
$events->registers(
    ['project.start', 'NeutronStars\Test\TestListener#start'],
    ['project.end', 'NeutronStars\Test\TestListener#end'],
    ['project.end', 'NeutronStars\Test\TestListener#testEnd']
);
$startEvent = new StartEvent('Test des events start');
echo $startEvent->getMessage();
$events->call('project.start', $startEvent);
echo '<br />';
echo $startEvent->getMessage();

echo '<hr>';
$endEvent = new EndEvent('Tes des events de fin');
echo $endEvent->getMessage();
$events->call('project.end', $endEvent);
echo '<br />';
echo $endEvent->getMessage();
