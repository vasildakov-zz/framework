# Framework
framework


```php

// Route
interface Route {
    public function path();
    public function handler();
    public function method();
    public function path();
}

// Router
interface Router {
    public function add(Route $route);
    public function match(Request $request);
}

// Action/Middleware
interface Action implements MiddlewareInterface {
    public function process(Request $request, Delegate $delegate);
}

// Application
interface Application {
    public function run(Request $request) : Response;
    public function route($path, $handler, $method, $name);
    public function process(Request $request);
}

```


## Container

```bash
$ composer require zendframework/zend-servicemanager
```

```php
<?php

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new ServiceManager();
(new Config($config['dependencies']))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);

return $container;

```


## Run app

```
$ php -S 0.0.0.0:8080 -t public public/index.php
```