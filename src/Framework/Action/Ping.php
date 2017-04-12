<?php

namespace Framework\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

use Fig\Http\Message\StatusCodeInterface;
use Fig\Http\Message\RequestMethodInterface;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\JsonResponse;

class Ping implements MiddlewareInterface
{
    /**
     * @param \DateTime $datetime
     */
    public function __construct(\DateTime $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * Process an incoming server request and return a response, optionally delegating
     * to the next middleware component to create the response.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate = null)
    {
        $timestamp = $this->datetime->getTimestamp();

        return new JsonResponse(['ack' => $timestamp], StatusCodeInterface::STATUS_OK);
    }
}
