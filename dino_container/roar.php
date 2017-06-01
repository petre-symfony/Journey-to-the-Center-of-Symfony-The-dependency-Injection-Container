<?php

namespace Dino\Play;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();

$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/config'));
$loader->load('services.yml');

/*
$loggerDefinition = new Definition('Monolog\Logger');
$loggerDefinition->setArguments(array(
  'main',
  array(new Reference('logger.stream.handler'))
));

$loggerDefinition->addMethodCall('pushHandler', array(
  new Reference('logger.std_out_logger')
));

$loggerDefinition->addMethodCall('debug', array(
  'The logger just got started'
));

$container->setDefinition('logger', $loggerDefinition);
*/

$handlerDefinition = new Definition('Monolog\Handler\StreamHandler');
$handlerDefinition->setArguments(array(__DIR__.'/dino.log'));
$container->setDefinition('logger.stream.handler', $handlerDefinition);

$stdLoggerDefinition = new Definition('Monolog\Handler\StreamHandler');
$stdLoggerDefinition->setArguments(array(
  'php://stdout'
));
$container->setDefinition('logger.std_out_logger', $stdLoggerDefinition);

runApp($container);

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

