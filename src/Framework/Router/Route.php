<?php declare(strict_types = 1);

namespace Framework\Router;

final class Route
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

        return $this;
    }

    public function path()
    {
        return $this->path;
    }

    private function setHandler($handler)
    {
        $this->handler = $handler;

        return $this;
    }

    public function handler()
    {
        return $this->handler;
    }

    private function setMethod($method)
    {
        $this->method = strtoupper($method);

        return $this;
    }

    public function method()
    {
        return $this->method;
    }

    private function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    public function name()
    {
        return $this->name;
    }
}
