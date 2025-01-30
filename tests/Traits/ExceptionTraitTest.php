<?php

declare(strict_types=1);

namespace Tests\Traits;

use Lion\Test\Test;
use PHPUnit\Framework\Attributes\Test as Testing;
use Tests\Providers\ExceptionProvider;

class ExceptionTraitTest extends Test
{
    private const string STATUS = 'error';
    private const string MESSAGE = 'ERR';
    private const int CODE = 500;

    #[Testing]
    public function exceptionTraitProperties(): void
    {
        $exception = new ExceptionProvider(self::MESSAGE, self::STATUS, self::CODE);

        $this->assertSame(self::MESSAGE, $exception->getMessage());
        $this->assertSame(self::CODE, $exception->getCode());
        $this->assertSame(self::STATUS, $exception->getStatus());
    }

    #[Testing]
    public function jsonSerialization(): void
    {
        $exception = new ExceptionProvider(self::MESSAGE, self::STATUS, self::CODE);

        $expectedJson = (object) [
            'code' => self::CODE,
            'status' => self::STATUS,
            'message' => self::MESSAGE,
        ];

        $this->assertSame($expectedJson, $exception->jsonSerialize());
    }
}
