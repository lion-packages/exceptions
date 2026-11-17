<?php

declare(strict_types=1);

namespace Lion\Exceptions;

use Exception as GlobalException;

/**
 * Support for exception handling.
 */
class Exception extends GlobalException
{
    /**
     * Exception response status.
     *
     * @var string $status
     */
    private string $status = 'error';

    /**
     * Additional response data.
     *
     * @var array<mixed>|bool|float|int|null|object|string $data
     */
    private array|bool|float|int|null|object|string $data = null;

    /**
     * Get response status.
     *
     * @return string
     */
    final public function getResponseStatus(): string
    {
        return $this->status;
    }

    /**
     * Change the response state of the exception.
     *
     * @param string $status Exception response status.
     *
     * @return Exception
     */
    final public function setResponseStatus(string $status): Exception
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the Additional response data.
     *
     * @return array<mixed>|bool|float|int|null|object|string
     */
    final public function getResponseData(): array|bool|float|int|null|object|string
    {
        return $this->data;
    }

    /**
     * Change additional response data.
     *
     * @param array<mixed>|bool|float|int|null|object|string $data Additional response data.
     *
     * @return Exception
     */
    final public function setResponseData(array|bool|float|int|null|object|string $data): Exception
    {
        $this->data = $data;

        return $this;
    }
}
