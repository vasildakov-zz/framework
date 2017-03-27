<?php

namespace Framework\Router;

interface RouterInterface
{
    public function addRoute(Route $route);

    public function match(Request $request);
}