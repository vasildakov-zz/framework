<?php

namespace Framework\Router;

use Aura\Router\Route as AuraRoute;
use Aura\Router\RouterContainer as Router;
use Aura\Router\Rule\Path as PathRule;
use Fig\Http\Message\RequestMethodInterface as RequestMethod;
use Psr\Http\Message\ServerRequestInterface as Request;


class AuraRouter implements RouterInterface
{
    public function __construct(Router $router = null)
    {
        if (null === $router) {
            $router = $this->createRouter();
        }
        $this->router = $router;
    }


    public function addRoute($route) {}

    public function match($request)
    {
        $matcher = $this->router->getMatcher();

        return $matcher->match($request);
    }
}
