<?php

declare(strict_types=1);

namespace Test;

use Lion\Exceptions\Exception;
use Lion\Test\Test;

class ExceptionTest extends Test
{
    const ERROR = 'error';
    const SUCCESS = 'success';

    private Exception $exception;

    protected function setUp(): void
    {
        $this->exception = new Exception();
    }

    public function testGetStatus()
    {
        $status = $this->exception->getStatus();

        $this->assertSame(self::ERROR, $status);
    }

    public function testSetStatus()
    {
        $this->exception->setStatus(self::SUCCESS);

        $this->assertSame(self::SUCCESS, $this->exception->getStatus());
    }

    public function testGetData()
    {
        $this->assertNull($this->exception->getData());
    }

    public function testSetData()
    {
        $newData = ['key' => 'value'];

        $this->exception->setData($newData);

        $this->assertSame($newData, $this->exception->getData());
    }
}
