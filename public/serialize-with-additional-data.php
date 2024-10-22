<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use Lion\Exceptions\Serialize;

(new Serialize())
    ->exceptionHandler(null, true);

throw new Exception('ERR', 500);
