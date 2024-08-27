<?php

/*
 * Nytris DNS
 * Copyright (c) Dan Phillimore (asmblah)
 * https://github.com/nytris/dns/
 *
 * Released under the MIT license.
 * https://github.com/nytris/dns/raw/main/MIT-LICENSE.txt
 */

declare(strict_types=1);

namespace Nytris\Dns;

use React\Cache\CacheInterface;
use React\Dns\Resolver\ResolverInterface;

/**
 * Interface DnsInterface.
 *
 * Defines the public facade API for the library.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
interface DnsInterface
{
    /**
     * Creates a ReactPHP DNS resolver with the given cache.
     */
    public function createResolver(CacheInterface $cache): ResolverInterface;
}
