<?php

namespace Framework\Router;

use Psr\Http\Message\ServerRequestInterface as Request;

interface RouterInterface
{
    public function addRoute(Route $route);

    public function match(Request $request);
}
