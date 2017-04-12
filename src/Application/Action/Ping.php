<?php

namespace Application\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

use Zend\Diactoros\Response\JsonResponse;

class Ping implements MiddlewareInterface
{
    /**
     * @param  ServerRequestInterface   $request
     * @param  DelegateInterface        $delegate
     * @return ResponseInterface        $response
     */
    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate = null
    ) {
        return new JsonResponse(['ack' => time()], 200);
    }
}
