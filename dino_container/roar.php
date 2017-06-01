<?php

namespace Dino\Play;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();

$loggerDefinition = new Definition('Monolog\Logger');
$loggerDefinition->setArguments(array(
  'main',
  array(new Reference('logger.stream.handler'))
));
$loggerDefinition->addMethodCall('debug', array(
  'The logger just got started'
));
$container->setDefinition('logger', $loggerDefinition);

$handlerDefinition = new Definition('Monolog\Handler\StreamHandler');
$handlerDefinition->setArguments(array(__DIR__.'/dino.log'));
$container->setDefinition('logger.stream.handler', $handlerDefinition);

runApp($container);

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

