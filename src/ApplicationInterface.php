<?php

namespace Framework;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ApplicationInterface
{
    public function run(ServerRequestInterface $request, ResponseInterface $response);
}
