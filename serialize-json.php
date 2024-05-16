<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once('./vendor/autoload.php');

use Lion\Exceptions\Exception;
use Lion\Exceptions\Interfaces\ExceptionInterface;
use Lion\Exceptions\Serialize;
use Lion\Exceptions\Traits\ExceptionTrait;

(new Serialize())
    ->exceptionHandler();

$customException = new class extends Exception implements ExceptionInterface
{
    use ExceptionTrait;
};

throw new $customException('ERR', 'error', 500);
