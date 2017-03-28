<?php

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use Framework\Action;
use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;

/** @var \Interop\Container\ContainerInterface $container */
$container = require 'config/container.php';
$application = $container->get(Framework\Application::class);

$application->run();
