<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use Lion\Test\Test;

class SerializeTest extends Test
{
    const CODE = 500;
    const STATUS = 'error';
    const MESSAGE = 'ERR';

    private Client $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    public function testExceptionHandler(): void
    {
        $exception = $this->getExceptionFromApi(function (): void {
            $this->client->post('http://localhost:8000/serialize.php');
        });

        $this->assertJsonContent($this->getResponse($exception->getMessage(), 'response:'), [
            'code' => self::CODE,
            'status' => self::STATUS,
            'message' => self::MESSAGE,
            'data' => [
                'file' => '/var/www/html/serialize.php',
                'line' => 14,
            ],
        ]);
    }

    public function testExceptionHandlerWithJsonSerializable(): void
    {
        $exception = $this->getExceptionFromApi(function (): void {
            $this->client->post('http://localhost:8000/serialize-json.php');
        });

        $this->assertJsonContent($this->getResponse($exception->getMessage(), 'response:'), [
            'code' => self::CODE,
            'status' => self::STATUS,
            'message' => self::MESSAGE,
        ]);
    }
}
