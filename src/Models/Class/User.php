<?php

namespace App\Models\Class;


class User
{
    private ?int $id = null;
    private string $email;
    private string $username;
    private string $password;
    private mixed $role;


    public function __construct(?int $id, string $email, string $username, string $password, string $role = 'user')
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;

    }
    public function isAdmin(): bool
    {
        if ($this->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;

    }

    public function getRole(): mixed
    {
        return $this->role;
    }

    public function setRole(mixed $role): User
    {
        $this->role = $role;
        return $this;
    }


}


