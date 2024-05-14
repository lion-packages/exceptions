<?php

declare(strict_types=1);

namespace Tests\Providers;

use Lion\Exceptions\Exception;
use Lion\Exceptions\Interfaces\ExceptionInterface;
use Lion\Exceptions\Traits\ExceptionTrait;

class ExceptionProvider extends Exception implements ExceptionInterface
{
    use ExceptionTrait;
}
