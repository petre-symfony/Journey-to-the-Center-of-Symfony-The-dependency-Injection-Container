<?php

namespace Dino\Play;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

require __DIR__.'/../vendor/autoload.php';

$start = microtime(true);

$container = new ContainerBuilder();
$container->setParameter('root_dir', __DIR__);

$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/config'));
$loader->load('services.yml');

$container->compile();

runApp($container);

$elapsed = round((microtime(true) - $start) * 1000);
$container->get('logger')->debug('Elapsed Time: '.$elapsed.'ms');

function runApp(ContainerBuilder $container){
  $container->get('logger')->info('ROOOOAR'); 
}

