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
    /**
     * @var RouterInterface
     */
    private $router;

    private $routes = [];

    /**
     * @var EmitterInterface
     */
    private $emitter;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param RouterInterface|null    $router
     * @param ContainerInterface|null $container
     * @param EmitterInterface|null   $emitter
     */
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
        if (!$this->emitter) {
            $this->emitter = new SapiEmitter();
        }
        return $this->emitter;
    }

    /**
     * Emitting responses
     */
    public function run(ServerRequestInterface $request = null)
    {
        // the request
        $request = $request ?: ServerRequestFactory::fromGlobals();

        // the response
        $response = $this->process($request);

        $emitter = $this->getEmitter();
        $emitter->emit($response);
    }


    public function route($path, $handler, $method, $name)
    {
        $route = new Router\Route($path, $middleware, $methods, $name);
        $this->router->addRoute($route);

        return $route;
    }


    public function process(ServerRequestInterface $request)
    {
        $route = $this->router->match($request);

        $callable = $route->handler;

        $response = $callable($request);

        return $response;
    }
}
