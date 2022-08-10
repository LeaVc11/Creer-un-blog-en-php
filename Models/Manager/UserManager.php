<?php

namespace App\models\Manager;

use App\models\User;

class UserManager extends DbManager
{
    public function login($email, $password)
    {
        // De base mon utilisateur est nulle
        $customer = null;

        // Je retrouve un utilisateur en fonction de son username
        $user = $this->findByEmail($email);

        if ($user) {
            // Il a trouvé un utilisateur il vérifie si le hash correspond
            if (password_verify($password, $user->getPassword())) {
                $customer = $user;
            }
        }
        return $customer;
    }


    public function findByEmail($email)
    {
        $customer = null;
        $query = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute(['email' => $email]);
        $customerFromBdd = $query->fetch();

        if ($customerFromBdd) {
            $customer = new User(
                $customerFromBdd['email'],
                $customerFromBdd['password'],
                $customerFromBdd['id']);
        }

        return $customer;
    }

    // Fonction retourne true si un utilisateur à déjà cet email
    // Sinon elle retourne false
    public function testExistUserByEmail($email)
    {
        $user = $this->findByEmail($email);

        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function register()
    {
//var_dump($user);
//die();
        $customer->setPassword(password_hash($customer->getPassword(), PASSWORD_DEFAULT));

        $query = $this->getBdd()->prepare("INSERT INTO user ( email, password)
        VALUES ( :email, :password )");

        $res = $query->execute([
            'email' => $customer->getEmail(),
            'password' => $customer->getPassword()
        ]);
    }
}