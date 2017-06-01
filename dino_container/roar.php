<?php

namespace Dino\Play;

use Monolog\Logger;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();

$streamHandler = new StreamHandler(__DIR__.'/dino.log');
$container->set('logger.stream.handler', $streamHandler);

$loggerDefinition = new Definition('Monolog\Logger');
$loggerDefinition->setArguments(array(
  'main',
  array(new Reference('logger.stream.handler'))
));
$container->setDefinition('logger', $loggerDefinition);



runApp($container);

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

