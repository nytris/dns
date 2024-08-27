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

namespace Nytris\Dns\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase as PhpUnitTestCase;

/**
 * Class AbstractTestCase.
 *
 * Base class for all test cases.
 *
 * @author Dan Phillimore <dan@ovms.co>
 */
abstract class AbstractTestCase extends PhpUnitTestCase
{
    use MockeryPHPUnitIntegration;
}
