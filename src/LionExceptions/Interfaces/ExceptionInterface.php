<?php

declare(strict_types=1);

namespace Lion\Exceptions\Interfaces;

use JsonSerializable;

/**
 * Implements the JsonSerializable interface for serializing exceptions in JSON
 * format.
 */
interface ExceptionInterface extends JsonSerializable
{
}
