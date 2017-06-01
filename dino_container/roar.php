<?php

namespace Dino\Play;

use Monolog\Logger;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Monolog\Handler\StreamHandler;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();

$streamHandler = new StreamHandler(__DIR__.'/dino.log');

$logger = new Logger('main', array($streamHandler));
$container->set('logger', $logger);

runApp($container);

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

