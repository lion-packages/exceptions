<?php

declare(strict_types=1);

namespace Lion\Exceptions\Traits;

use Throwable;

/**
 * Implements the abstract methods necessary to execute an exception
 *
 * @package Lion\Exceptions\Traits
 *
 * @codeCoverageIgnore
 * @phpstan-ignore-next-line
 */
trait ExceptionTrait
{
    /**
     * Construct the exception
     *
     * @param string $message [The Exception message to throw]
     * @param string $status [Response status]
     * @param int $code [The Exception code]
     * @param mixed $data [Response data]
     * @param Throwable|null $previus [The previous exception used for the
     * exception chaining]
     */
    public function __construct(
        string $message,
        string $status = 'error',
        int $code = 500,
        mixed $data = null,
        ?Throwable $previus = null
    ) {
        $this
            ->setStatus($status)
            ->setData($data);

        parent::__construct($message, $code, $previus);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): mixed
    {
        if (null === $this->getData()) {
            return (object) [
                'code' => $this->getCode(),
                'status' => $this->getStatus(),
                'message' => $this->getMessage(),
            ];
        }

        return (object) [
            'code' => $this->getCode(),
            'status' => $this->getStatus(),
            'message' => $this->getMessage(),
            'data' => $this->getData(),
        ];
    }
}
