<?php

namespace Framework;

use Framework\Router\RouterInterface;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;


class Application implements ApplicationInterface
{
    private $emitter;
    private $router;
    private $container;

    public function __construct(
        RouterInterface $router = null,
        ContainerInterface $container = null,
        EmitterInterface $emitter = null
    ) {
        $this->router     = $router;
        $this->container  = $container;
        $this->emitter    = $emitter;
    }

    public function getEmitter()
    {
        if (! $this->emitter) {
            $this->emitter = new SapiEmitter();
        }
        return $this->emitter;
    }

    /**
     * Emitting responses
     * @see https://github.com/zendframework/zend-diactoros/blob/master/doc/book/emitting-responses.md
     */
    public function run(ServerRequestInterface $request = null, ResponseInterface $response = null)
    {
        // $response = $response ?: new Response();

        $response = $this->process($request, $delegate);
        $emitter = $this->getEmitter();
        $emitter->emit($response);
    }


    /**
     * @see https://github.com/zendframework/zend-expressive/blob/master/src/Middleware/DispatchMiddleware.php
     * @see https://github.com/zendframework/zend-expressive/blob/master/src/Middleware/RouteMiddleware.php
     */
    public function process(ServerRequestInterface $request)
    {
        $result = $this->router->match($request);

        // handler
        // return $delegate->process($request);
        $response = new Response\JsonResponse(['bar' => 'foo'], 200);
        return $response;
    }
}
