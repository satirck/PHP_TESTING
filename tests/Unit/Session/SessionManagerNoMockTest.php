<?php

declare(strict_types=1);

namespace App\Tests\Unit\Session;

use App\Session\SessionManager;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SessionManagerNoMockTest extends TestCase
{
    #[Test]
    public function testCreationSession(): void
    {
        $manager = new SessionManager();

        $this->assertTrue(
            session_status() === PHP_SESSION_ACTIVE
        );
    }

    /**
     * @covers \App\Session\SessionManager::clear
     **/
    #[Test]
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

    /**
     * @covers \App\Session\SessionManager::set
     * @covers \App\Session\SessionManager::has
     **/
    #[Test]
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

    /**
     * @covers \App\Session\SessionManager::set
     * @covers \App\Session\SessionManager::has
     * @covers \App\Session\SessionManager::remove
     **/
    #[Test]
    #[DataProvider('setValueManagerDataProvider')]
    public function testUnsetValue(string $key, mixed $value): void
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

        $manager->remove($key);

        $this->assertFalse(
            $manager->has($key),
            sprintf('%s is still set', $key)
        );
    }
}
