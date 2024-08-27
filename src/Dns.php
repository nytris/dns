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
use React\Dns\Config\Config as DnsConfig;
use React\Dns\Resolver\Factory as DnsFactory;
use React\Dns\Resolver\ResolverInterface;

/**
 * Class Dns.
 *
 * Defines the public facade API for the library.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class Dns implements DnsInterface
{
    /**
     * @param string[] $fallbackNameservers
     */
    public function __construct(
        private readonly array $fallbackNameservers = ['8.8.8.8']
    ) {
    }

    /**
     * @inheritDoc
     */
    public function createResolver(CacheInterface $cache): ResolverInterface
    {
        $dnsFactory = new DnsFactory();

        // Try to load nameservers from system config or default to Google's public DNS.
        $config = DnsConfig::loadSystemConfigBlocking();

        if (!$config->nameservers) {
            $config->nameservers = $this->fallbackNameservers;
        }

        return $dnsFactory->createCached(
            config: $config,
            cache: $cache
        );
    }
}
