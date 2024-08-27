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

namespace Nytris\Dns\Tests\Functional;

use Nytris\Dns\Dns;
use Nytris\Dns\Tests\AbstractTestCase;
use React\Cache\ArrayCache;
use React\Dns\Resolver\Resolver;

/**
 * Class DnsTest.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
class DnsTest extends AbstractTestCase
{
    private ArrayCache $cache;
    private Dns $dns;

    public function setUp(): void
    {
        $this->cache = new ArrayCache();
        $this->dns = new Dns(['1.1.1.1', '2.2.2.2']);
    }

    public function testCreateResolverReturnsAResolver(): void
    {
        static::assertInstanceOf(Resolver::class, $this->dns->createResolver($this->cache));
    }
}
