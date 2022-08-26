<?php

namespace App\Models\Class;


class User
{
    private ?int $id = null;
    private string $email;
    private string $username;
    private string $password;
    private mixed $role;


    public function __construct(int $id, string $email, string $username, string $password, string $role = 'user')
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;

    }

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;

    }

    /**
     * @return mixed|string
     */
    public function getRole(): mixed
    {
        return $this->role;
    }

    /**
     * @param mixed|string $role
     * @return User
     */
    public function setRole(mixed $role): User
    {
        $this->role = $role;
        return $this;
    }


}


