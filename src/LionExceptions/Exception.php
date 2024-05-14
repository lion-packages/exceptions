<?php

declare(strict_types=1);

namespace Lion\Exceptions;

use Exception as GlobalException;

/**
 * Support for exception handling
 *
 * @package Lion\Exceptions
 */
class Exception extends GlobalException
{
    /**
     * [Exception response status]
     *
     * @var string $status
     */
    private string $status = 'error';

    /**
     * [Response data]
     *
     * @var mixed $data
     */
    private mixed $data = null;

    /**
     * Get response status
     *
     * @return string
     */
    final public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Change the response state of the exception
     *
     * @param string $status [Exception response status]
     *
     * @return Exception
     */
    final public function setStatus(string $status): Exception
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the response data
     *
     * @return mixed
     */
    final public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * Change response data
     *
     * @param mixed $data [Response data]
     *
     * @return Exception
     */
    final public function setData(mixed $data): Exception
    {
        $this->data = $data;

        return $this;
    }
}
