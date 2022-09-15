<?php

namespace App\Models\Class;
class Contact
{
    private ?int $id;
    private ?string $email;
    private ?string $username;
    private ?string $message;

    public function __construct(?int $id = null, ?string  $email = null , ?string  $username = null, ?string  $message = null)
    {

        $this->id = $id ;
        $this->email = $email;
        $this->username = $username;
        $this->message = $message;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername():string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }
}