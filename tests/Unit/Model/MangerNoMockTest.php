<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model;

use App\Model\Manager;
use App\Session\SessionManager;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class MangerNoMockTest extends TestCase
{
    /**
     * @covers \App\Model\Manager::setUser
     * @covers \App\Model\Manager::getUser
     */
    #[Test]
    public function testSetUserIntoEmpty(): void
    {
        $manager = new Manager(
            new SessionManager()
        );

        $manager->setUser(0, 'Mikita');

        $setUser = $manager->getUser(0);

        $this->assertNotNull($setUser, 'User is not exists');
        $this->assertTrue(
            $setUser === [0, 'Mikita'],
            'User is not the same as giving'
        );
    }

    public static function usersDataProvider(): array
    {
        return [
            [
                [0 => 'Mikita', 1 => 'Dasha', 2 => 'Oleg'],
            ]
        ];
    }

    /**
     * @covers \App\Model\Manager::setUsers
     * @covers \App\Model\Manager::getUsers
     */
    #[Test]
    #[DataProvider('usersDataProvider')]
    public function testGetUsers(array $users): void
    {
        $manager = new Manager(
            new SessionManager()
        );

        $manager->setUsers($users);

        $newUsers = $manager->getUsers();

        $setUser = $newUsers[0];
        $this->assertNotNull($setUser, 'User is not exists');
    }
}
