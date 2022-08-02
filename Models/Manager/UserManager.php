<?php

namespace App\Models;

use App\Models\Manager\DbManager;


class UserManager extends DbManager
{
    public function login($email, $password){

        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE login = :email");
        $req->execute([
            'email' => $email
        ]);

        $resultat = $req->fetch();

        if($resultat){
            if(password_verify($password, $resultat['password']))
                $user = new User($resultat['email'], $resultat['password'], $resultat['id']);
        }
        return $user;

    }

}