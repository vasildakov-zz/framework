<?php

namespace Framework\Router;

class Route
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var callable
     */
    private $handler;

   /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $name;


    /**
     * Counstructor
     *
     * @param string   $path     Path to match
     * @param callable $handler  Handler to use when this route is matched
     * @param string   $method   Allowed HTTP method
     * @param string   $name     The route name
     */
    public function __construct($path, $handler, $method, $name = null)
    {
        $this->setPath($path);
        $this->setHandler($handler);
        $this->setMethod($method);
        $this->setName($name);
    }

    private function setPath($path)
    {
        if (! is_string($path)) {
            throw new \InvalidArgumentException('Invalid path; must be a string');
        }
        $this->path = $path;
    }

    private function setHandler($handler)
    {
        if (! is_callable($handler)) {
            throw new \InvalidArgumentException('Invalid handler; must be a callable');
        }
    }

    private function setMethod($method)
    {
        $this->method = strtoupper($method);
    }

    private function setName($name)
    {
        $this->name = (string) $name;
    }
}
