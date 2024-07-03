<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model;

use App\Model\Manager;
use App\Session\SessionInterface;
use App\Session\SessionManager;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class ManagerWithMock extends TestCase
{
    /**
     * @throws Exception
     */
    #[Test]
    public function testSetUserIntoEmpty(): void
    {
        $session = $this->createStub(SessionInterface::class);
        $session->method('get')
            ->willReturn(
                [0 => 'Mikita']
            );

        $manager = new Manager($session);

        $manager->setUser(0, 'Mikita');
        $data = $manager->getUser(0);

        self::assertEquals(
            'Mikita', $data['1']
        );
    }
}
