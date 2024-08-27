# Nytris DNS

[![Build Status](https://github.com/nytris/dns/workflows/CI/badge.svg)](https://github.com/nytris/dns/actions?query=workflow%3ACI)

Concise [ReactPHP][ReactPHP] DNS config with caching.

## Usage
Install this package with Composer:

```shell
$ composer require nytris/dns
```

### When using Nytris platform (recommended)

Configure Nytris platform:

`nytris.config.php`

```php
<?php

declare(strict_types=1);

use Nytris\Boot\BootConfig;
use Nytris\Boot\PlatformConfig;
use Nytris\Cache\Adapter\ReactCacheAdapter;
use Nytris\Dns\Dns;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$bootConfig = new BootConfig(new PlatformConfig(__DIR__ . '/var/cache/nytris/'));

$bootConfig->installPackage(new MyNytrisPackage(
    // Using Nytris Cache & Symfony Cache adapters as an example.
    connectorFactory: fn (string $cachePath) => new Connector([
        'dns' => (new Dns())->createResolver(
            new ReactCacheAdapter(
                new FilesystemAdapter(
                    'my_cache_key',
                    0,
                    $cachePath
                )
            )
        ),
    ])
));

return $bootConfig;
```

[ReactPHP]: https://reactphp.org/
