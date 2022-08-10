<?php

namespace App\models\Manager;

use App\entity\User;

class UserManager extends DbManager
{
    public function login($email, $password,$role)
    {
//        var_dump($email);
//        var_dump($password);
        $customer = null;

        // Je retrouve un utilisateur en fonction de son username
        $user = $this->findByEmail($email);


        $req = $this->getBdd()->prepare("INSERT INTO user ( email, password, role)
        VALUES (:email, :password, :role )");

        $customer= $req->execute([
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
//var_dump($req->fetch);
//die();
        if ($user) {
            // Il a trouvé un utilisateur il vérifie si le hash correspond
            if (password_verify($password, $user->getPassword())) {
                $customer = $user;
            }
        }
        return $customer;

//        $resultat = $req->fetch();
//dd($resultat);
    }
    public function findByEmail($email) {
        $customer = null;
        $query = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute(['email'=> $email]);
        $userFromBdd = $query->fetch();

        if($userFromBdd) {
            $customer= new User(

                $userFromBdd['email'],
                $userFromBdd['password'],
                $userFromBdd['role']);
        }

        return $customer;
    }



}