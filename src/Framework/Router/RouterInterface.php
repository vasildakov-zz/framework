<?php

namespace Framework\Router;

interface RouterInterface
{
    public function addRoute($route);

    public function match($request);
}