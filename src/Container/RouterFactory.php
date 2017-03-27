<?php
namespace Framework\Container;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\AuraRouter as AuraBridge;

class RouterFactory
{
    /**
     * @param ContainerInterface $container
     * @return AuraBridge
     */
    public function __invoke(ContainerInterface $container)
    {
        return new AuraBridge($container->get('Aura\Router\Router'));
    }
}
