<?php

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use Framework\Action;
use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

// use IoC container to get actions
$map->get('home', '/', new Action\Home());
$map->get('ping', '/ping', new Action\Ping());


// get the route matcher from the container ...
$matcher = $routerContainer->getMatcher();

// .. and try to match the request to a route.
$route = $matcher->match($request);

$callable = $route->handler;

$response = $callable($request, $response);

// use emit
echo $response->getBody()->getContents();
exit();


$application = new \Framework\Application();
$application->run();
