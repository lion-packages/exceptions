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
    public function getResponseStatus(): void
    {
        $status = $this->exception->getResponseStatus();

        $this->assertSame(self::ERROR, $status);
    }

    #[Testing]
    public function setResponseStatus(): void
    {
        $this->exception->setResponseStatus(self::SUCCESS);

        $this->assertSame(self::SUCCESS, $this->exception->getResponseStatus());
    }

    #[Testing]
    public function getData(): void
    {
        $this->assertNull($this->exception->getResponseData());
    }

    #[Testing]
    public function setDataTest(): void
    {
        $newData = ['key' => 'value'];

        $this->exception->setResponseData($newData);

        $this->assertSame($newData, $this->exception->getResponseData());
    }
}
