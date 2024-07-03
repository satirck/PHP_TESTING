<?php

declare(strict_types=1);

namespace App\Tests\Unit\Session;

use App\Session\SessionManager;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SessionManagerNoMockTest extends TestCase
{
    public function testCreationSession(): void
    {
        $manager = new SessionManager();

        $this->assertTrue(
            session_status() === PHP_SESSION_ACTIVE
        );
    }

    public function testClearingSession(): void
    {
        $manager = new SessionManager();
        $manager->clear();

        self::assertTrue($_SESSION === [], 'Not empty');
    }

    public static function setValueManagerDataProvider(): array
    {
        return [
            ['name', 'Mikita',],
            ['age', 20,],
            ['mail', 'retdarkw@gmail.com',],
        ];
    }

    #[DataProvider('setValueManagerDataProvider')]
    public function testSetValue(string $key, mixed $value): void
    {
        $manager = new SessionManager();

        $manager->set(
            $key,
            $value
        );

        $this->assertTrue(
            $manager->has($key),
            sprintf('%s not set', $key)
        );
    }
}
