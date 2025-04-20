<?php

declare(strict_types=1);

namespace Lion\Exceptions;

use Closure;
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
     * @param Closure|null $callback [Method to execute additional logic]
     * @param bool $addInformation [Defines whether an object displays
     * additional information]
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    final public function exceptionHandler(?Closure $callback = null, bool $addInformation = false): void
    {
        set_exception_handler(function (Throwable $exception) use ($callback, $addInformation): void {
            $code = $exception->getCode() === 0 ? self::INTERNAL_SERVER_ERROR : $exception->getCode();

            if (null != $callback) {
                $callback($code, $exception);
            }

            http_response_code($code);

            if ($exception instanceof JsonSerializable) {
                die(json_encode($exception));
            }

            if ($addInformation) {
                die(json_encode([
                    'code' => $code,
                    'status' => self::ERROR,
                    'message' => $exception->getMessage(),
                    'data' => [
                        'file' => $exception->getFile(),
                        'line' => $exception->getLine(),
                    ],
                ]));
            }

            die(json_encode([
                'code' => $code,
                'status' => self::ERROR,
                'message' => $exception->getMessage(),
            ]));
        });
    }
}
