<?php

namespace Framework\Delegate;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NotFound implements DelegateInterface
{
    public function __construct() {}

    public function process(ServerRequestInterface $request)
    {

    }
}
