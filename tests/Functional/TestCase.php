<?php

declare(strict_types=1);

namespace SlimAPI\Tests\Functional;

use SlevomatCodingStandard\Sniffs\TestCase as SlevomatTestCase;

abstract class TestCase extends SlevomatTestCase
{
    protected static function getSniffClassName(): string
    {
        return substr(
            str_replace('\Tests\Functional', '', static::class),
            0,
            -strlen('Test'),
        );
    }
}
