<?php
namespace App\Models\Class;
class Contact
{
    private $id;
    private $username;
    private $email;
    private $message;

    /**
     * @param $id
     * @param $username
     * @param $email
     */
    public function __construct($id, $username, $email, $message)
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

    /**
     * @param mixed $id
     * @return Contact
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Contact
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }/**
 * @return mixed
 */
public function getMessage()
{
    return $this->message;
}/**
 * @param mixed $message
 * @return Contact
 */
public function setMessage($message)
{
    $this->message = $message;
    return $this;
}

}