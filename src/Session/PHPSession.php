<?php

namespace Session;

class PHPSession implements SessionInterface
{
    private function ensureStarted(){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }

    }

    public function get(string $key, mixed $default = null): mixed
    {
        $this->ensureStarted();
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    public function set($key, $value): void
    {
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    public function delete($key): void
    {
        $this->ensureStarted();
       unset ($_SESSION[$key]);
    }
}