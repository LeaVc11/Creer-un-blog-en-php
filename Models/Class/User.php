<?php

namespace App\Models\Class;


class User
{
    private int $id;
/*    private string $username;*/
    private string $password;
    private string $email;
    private mixed $role;


    /**
     * @param int $id
     * @param string $password
     * @param string $email
     *
     */
    public function __construct(string $email/*, $username*/, string $password/*,int $id = null*/, $role = 'user')
    {
        /*        $this->id = $id ;*/
        $this->password = $password;
/*        $this->user = $username;*/
        $this->email = $email;
        $this->role = $role;

    }

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        }else{
            return false;
        }
    }

//    /**
//     * @return string
//     */
//    public function getUsername(): string
//    {
//        return $this->username;
//    }
//
//    /**
//     * @param string $username
//     * @return User
//     */
//    public function setUsername(string $username): User
//    {
//        $this->username = $username;
//        return $this;
//    }

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
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
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


