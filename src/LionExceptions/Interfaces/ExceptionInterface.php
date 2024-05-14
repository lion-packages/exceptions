<?php

declare(strict_types=1);

namespace Lion\Exceptions\Interfaces;

use JsonSerializable;

/**
 * Implements the JsonSerializable interface for serializing exceptions in JSON
 * format
 *
 * @package Lion\Exceptions\interfaces
 */
interface ExceptionInterface extends JsonSerializable
{
}
