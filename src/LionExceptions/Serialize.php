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
     * Manages exceptions and serializes them to JSON format
     *
     * @return void
     */
    final public function exceptionHandler(): void
    {
        set_exception_handler(function (Throwable $exception): void {
            if ($exception->getCode() != 0) {
                http_response_code($exception->getCode());
            }

            if ($exception instanceof JsonSerializable) {
                die(json_encode($exception));
            }

            die(json_encode([
                'code' => $exception->getCode(),
                'status' => 'error',
                'message' => $exception->getMessage(),
                'data' => [
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ]
            ]));
        });
    }
}
