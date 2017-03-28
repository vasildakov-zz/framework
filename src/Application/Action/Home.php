<?php

namespace Application\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

use Zend\Diactoros\Response\JsonResponse;

class Home
{
    public function __construct() {}

    /**
     * @param  RequestInterface   $request
     * @return ResponseInterface  $response
     */
    public function __invoke(RequestInterface $request) : ResponseInterface
    {
        return new JsonResponse(['page' => 'home'], 200);
    }
}
