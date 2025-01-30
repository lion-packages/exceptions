<?php

declare(strict_types=1);

namespace Tests;

use Lion\Exceptions\Exception;
use Lion\Test\Test;
use PHPUnit\Framework\Attributes\Test as Testing;

class ExceptionTest extends Test
{
    private const string ERROR = 'error';
    private const string SUCCESS = 'success';

    private Exception $exception;

    protected function setUp(): void
    {
        $this->exception = new Exception();
    }

    #[Testing]
    public function getStatus(): void
    {
        $status = $this->exception->getStatus();

        $this->assertSame(self::ERROR, $status);
    }

    #[Testing]
    public function setStatus(): void
    {
        $this->exception->setStatus(self::SUCCESS);

        $this->assertSame(self::SUCCESS, $this->exception->getStatus());
    }

    #[Testing]
    public function getData(): void
    {
        $this->assertNull($this->exception->getData());
    }

    #[Testing]
    public function setDataTest(): void
    {
        $newData = ['key' => 'value'];

        $this->exception->setData($newData);

        $this->assertSame($newData, $this->exception->getData());
    }
}
