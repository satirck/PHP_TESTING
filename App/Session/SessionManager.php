<?php

declare(strict_types=1);

namespace App\Session;

class SessionManager implements SessionInterface
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param string $key key of set value in past
     * @return mixed if value was set
     * @return null when the value with key $key was not found
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key)){
            return null;
        }

        return $_SESSION[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return SessionManager
     */
    public function set(string $key, mixed $value): SessionInterface
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function remove(string $key): void
    {
        if ($this->has($key)){
            unset($_SESSION[$key]);
        }
    }

    public function clear(): void
    {
        session_unset();
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
}
