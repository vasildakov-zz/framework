<?php
namespace Framework\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

interface ControllerInterface
{
    public function __invoke(RequestInterface $request) : ResponseInterface;
}
