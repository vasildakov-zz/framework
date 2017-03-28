<?php

namespace Framework\Router;

use Aura\Router\Route as AuraRoute;
use Aura\Router\RouterContainer as Router;
use Aura\Router\Rule\Path as PathRule;

use Fig\Http\Message\RequestMethodInterface as RequestMethod;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuraRouter implements RouterInterface
{
    private $router;

    private $routes = [];


    public function __construct(Router $router = null)
    {
        if (null === $router) {
            $router = $this->createRouter();
        }
        $this->router = $router;
    }


    public function addRoute(Route $route)
    {
        $auraRoute = new AuraRoute();
        $auraRoute->name($route->getName());
        $auraRoute->path($route->getPath());
        $auraRoute->handler($route->getHandler());
        $auraRoute->allows($route->getMethod());

        $this->router->getMap()->addRoute($auraRoute);

        //$this->router->getMap()->addRoute($auraRoute);

        //$this->routes[] = $route;
    }


    public function match(Request $request)
    {
        $matcher = $this->router->getMatcher();

        return $matcher->match($request);

    }
}
