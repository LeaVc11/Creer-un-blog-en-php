<?php

namespace App\models\Manager;


use App\Models\Class\User;
use PDO;

class UserManager extends DbManager
{
    public function login($email, $password): ?User
    {
        // De base mon utilisateur est nulle
        $customer = null;

        // Je retrouve un utilisateur en fonction de son username
        $user = $this->findByEmail($email);

        if($user){
            // Il a trouvé un utilisateur il vérifie si le hash correspond
            if(password_verify($password,  $user->getPassword())){
                $customer= $user;
            }
        }
        return $customer;
    }
    public function findByEmail($email): ?User
    {
        $customer = null;
        $query = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute(['email'=> $email]);
        $customerFromBdd = $query->fetch();

        if($customerFromBdd) {
            $customer = new User(
                $customerFromBdd['email'],
                $customerFromBdd['username'],
                $customerFromBdd['password'],
                $customerFromBdd['role']);

        }

        return $customer;
    }
    // Fonction retourne true si un utilisateur à déjà cet email
    // Sinon elle retourne false
    public function testExistUserByEmail($email): bool
    {
        $user = $this->findByEmail($email);

        if($user){
            return true;
        } else {
            return false;
        }
    }
    public function register(User $user)
    {
var_dump($user);
die();
        $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));

        $query = $this->getBdd()->prepare("INSERT INTO user (`email`,`username`,`password`,`role`)
        VALUES (:email, :role,  :password )");

        $res = $query->execute([
            'email'=> $user->getEmail(),
            'username'=> $user->getUsername(),
            'password'=> $user->getPassword(),
            'role'=> $user->getRole(),

        ]);

    }
}