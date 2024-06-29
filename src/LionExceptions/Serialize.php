<?php

declare(strict_types=1);

namespace Lion\Exceptions;

use JsonSerializable;
use Throwable;

/**
 * Manage exceptions defined in the system
 *
 * @package Lion\Bundle\Helpers
 */
final class Serialize
{
    /**
     * [The HTTP 500 Internal Server Error response status code indicates that
     * the server encountered an unexpected condition that prevented it from
     * fulfilling the request]
     *
     * @public const INTERNAL_SERVER_ERROR
     */
    public const int INTERNAL_SERVER_ERROR = 500;

    /**
     * [Represents an error response object]
     *
     * @const ERROR
     */
    public const string ERROR = 'error';

    /**
     * Manages exceptions and serializes them to JSON format
     *
     * @return void
     */
    final public function exceptionHandler(): void
    {
        set_exception_handler(function (Throwable $exception): void {
            if ($exception->getCode() === 0) {
                http_response_code(self::INTERNAL_SERVER_ERROR);
            } else {
                http_response_code($exception->getCode());
            }

            if ($exception instanceof JsonSerializable) {
                die(json_encode($exception));
            }

            die(json_encode([
                'code' => $exception->getCode() === 0 ? self::INTERNAL_SERVER_ERROR : $exception->getCode(),
                'status' => self::ERROR,
                'message' => $exception->getMessage(),
                'data' => [
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                ],
            ]));
        });
    }
}
