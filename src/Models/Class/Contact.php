<?php

namespace App\Models\Class;
class Contact
{
    private ?int $id;
    private ?string $username;
    private ?string $email;
    private ?string $message;

    public function __construct($id = null, $username = null, $email = null , $message = null)
    {

        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->message = $message;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage($message): static
    {
        $this->message = $message;
        return $this;
    }

}