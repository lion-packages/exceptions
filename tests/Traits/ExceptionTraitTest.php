<?php

declare(strict_types=1);

namespace Tests\Traits;

use Lion\Test\Test;
use Tests\Providers\ExceptionProvider;

class ExceptionTraitTest extends Test
{
    const STATUS = 'error';
    const MESSAGE = 'ERR';

    public function testConstruct(): void
    {
        $this->expectException(ExceptionProvider::class);
        $this->expectExceptionMessage(self::MESSAGE);
        $this->expectExceptionCode(500);

        throw new ExceptionProvider(self::MESSAGE, self::STATUS, 500);
    }
}
