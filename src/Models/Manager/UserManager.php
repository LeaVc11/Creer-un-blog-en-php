<?php

namespace App\Models\Manager;


use App\Models\Class\User;
use PDO;


class UserManager extends DbManager
{
    private array $users = [];
    public function login(string $email,string $password): ?User
    {
        $customer = null;

        $user = $this->findByEmail($email);

        if ($user) {

            if (password_verify($password, $user->getPassword())) {
                $customer = $user;
            }
        }
        return $customer;
    }
    public function findByEmail(string $email): ?User
    {
        $customer = null;
        $query = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute(['email' => $email]);
        $customerFromBdd = $query->fetch();

        if ($customerFromBdd) {
            $customer = new User(
                $customerFromBdd['id'],
                $customerFromBdd['email'],
                $customerFromBdd['username'],
                $customerFromBdd['password'],
                $customerFromBdd['role']);
        }
        return $customer;
    }
    public function testExistUserByEmail( string $email): bool
    {
        $user = $this->findByEmail($email);

        if ($user) {
            return true;
        } else {
            return false;
        }
    }
    public function register(User $user):void
    {

        $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));

        $query = $this->getBdd()->prepare("INSERT INTO `user` (`email`,`username`,`password`,`role`)
        VALUES (:email,:username,:password,:role )");

        $res = $query->execute([
            'email'=> $user->getEmail(),
            'username'=> $user->getUsername(),
            'password'=> $user->getPassword(),
            'role'=> $user->getRole(),

        ]);
    }
    public function deleteUser(User $user):void
    {
        $req = $this->getBdd()->prepare('DELETE FROM `user` WHERE id = :id');

        $req->execute(['id' => $user->getId()]);
    }
    public function loadingUsers(): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM user  ");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($users as $user) {
            $u = $this->createdObjectUser($user);
            $this->users[] = $u;
        }
        return $this->users;
    }
    private function createdObjectUser(array $user): User
    {
        return new User(
            $user['id'],
            $user['email'],
            $user['username'],
            $user['password'],
            $user['role'],

        );
    }
    public function findById(?int $id): ?User
    {
        $user = null;
        $query = $this->getBdd()->prepare("SELECT * FROM user WHERE id = :id");
        $query->execute(['id' => $id]);
        $userFromBdd = $query->fetch();
        if ($userFromBdd) {
            $user = new User(
                $userFromBdd['id'],
                $userFromBdd['email'],
                $userFromBdd['username'],
                $userFromBdd['password'],
                $userFromBdd['role']);
        }
        return $user;
    }


}