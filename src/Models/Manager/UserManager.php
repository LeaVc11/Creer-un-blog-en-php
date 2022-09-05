<?php

namespace App\models\Manager;


use App\Models\Class\User;


class UserManager extends DbManager
{
    public function login($email, $password): ?User
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

    public function findByEmail($email): ?User
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
    public function testExistUserByEmail($email): bool
    {
        $user = $this->findByEmail($email);

        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function register(User $user)
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
}