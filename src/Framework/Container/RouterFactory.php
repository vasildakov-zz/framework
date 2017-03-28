<?php
namespace Framework\Container;

use Psr\Container\ContainerInterface;
use Framework\Router\AuraRouter as AuraBridge;

use Application\Action;

class RouterFactory
{
    /**
     * @param ContainerInterface $container
     * @return AuraBridge
     */
    public function __invoke(ContainerInterface $container)
    {
        //$router = $container->get('Aura\Router\Router');
        $router = new \Aura\Router\RouterContainer();
        $map = $router->getMap();

        $map->get('home', '/', new Action\Home());
        $map->get('ping', '/ping', new Action\Ping());

        return new AuraBridge($router);
    }
}
