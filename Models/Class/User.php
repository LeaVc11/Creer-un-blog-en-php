<?php

namespace App\Models\Class;



class User
{
private int $id;
private string $password;
private string $email;


    /**
     * @param int $id
 * @param string $password
     * @param string $email
     *
     */
    public function __construct( string $email, string $password/*,int $id = null*/)
    {
/*        $this->id = $id ;*/
        $this->password = $password;
        $this->email = $email;
//        $this->role = $role;

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
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Tinyint
     */
    public function getRole(): Tinyint
    {
        return $this->role;
    }

    /**
     * @param Tinyint $role
     * @return User
     */
    public function setRole(Tinyint $role): User
    {
        $this->role = $role;
        return $this;
    }


}


