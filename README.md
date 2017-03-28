# Framework
framework

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