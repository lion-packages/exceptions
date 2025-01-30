<?php

declare(strict_types=1);

namespace Tests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lion\Test\Test;
use PHPUnit\Framework\Attributes\Test as Testing;

class SerializeTest extends Test
{
    private const int CODE = 500;
    private const string STATUS = 'error';
    private const string MESSAGE = 'ERR';

    private Client $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    /**
     * @throws Exception
     */
    #[Testing]
    public function exceptionHandler(): void
    {
        try {
            $this->client->get('http://localhost:8000/serialize.php');
        } catch (GuzzleException $exception) {
            $this->assertJsonContent($this->getResponse($exception->getMessage(), 'response:'), [
                'code' => self::CODE,
                'status' => self::STATUS,
                'message' => self::MESSAGE,
            ]);
        }
    }

    /**
     * @throws Exception
     */
    #[Testing]
    public function exceptionHandlerWithJsonSerializable(): void
    {
        try {
            $this->client->get('http://localhost:8000/serialize-json.php');
        } catch (GuzzleException $exception) {
            $this->assertJsonContent($this->getResponse($exception->getMessage(), 'response:'), [
                'code' => self::CODE,
                'status' => self::STATUS,
                'message' => self::MESSAGE,
            ]);
        }
    }
}
