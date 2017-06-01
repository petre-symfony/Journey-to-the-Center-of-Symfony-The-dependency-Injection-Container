<?php

namespace Dino\Play;

use Monolog\Logger;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();

$logger = new Logger('main');
$container->set('logger', $logger);

runApp($container);

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

