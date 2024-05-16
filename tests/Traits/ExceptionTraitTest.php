<?php

declare(strict_types=1);

namespace Tests\Traits;

use Lion\Test\Test;
use Tests\Providers\ExceptionProvider;

class ExceptionTraitTest extends Test
{
    const STATUS = 'error';
    const MESSAGE = 'ERR';
    const CODE = 500;

    public function testConstruct(): void
    {
        $this
            ->exception(ExceptionProvider::class)
            ->exceptionMessage(self::MESSAGE)
            ->exceptionStatus(self::STATUS)
            ->exceptionCode(self::CODE)
            ->expectLionException(function (): void {
                throw new ExceptionProvider(self::MESSAGE, self::STATUS, self::CODE);
            });
    }
}
