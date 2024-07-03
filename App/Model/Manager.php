<?php

declare(strict_types=1);

namespace App\Model;

use App\Session\SessionInterface;

class Manager
{
    public function __construct(
        public SessionInterface $sessionManager,
    )
    {
    }

    public function getUsers(): ?array
    {
        return $this->sessionManager->get('users');
    }

    public function getUser(int $id): ?array
    {
        return
            [
                $id,
                $this->sessionManager->get('users')[$id]
            ] ??
            null;
    }

    public function setUsers(array $users): void
    {
        $this->sessionManager->set('users', $users);
    }

    public function setUser(int $id, string $name): void
    {
        $users = $this->sessionManager->get('users');
        $users[$id] = $name;
        $this->sessionManager->set('users', $users);
    }
}
