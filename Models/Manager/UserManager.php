<?php

namespace App\models;

use App\models\Manager\DbManager;
use PDO;

class UserManager extends DbManager
{
    public function login($login, $password){

        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE login = :login");
        $req->execute([
            'username'=> $login
        ]);

        $resultat = $req->fetch();

        if($resultat){
            if(password_verify($password, $resultat['password'])){
                $utilisateur = new User($resultat['login'], $resultat['password'], $resultat['id']);
            }
        }

        return $user;

    }

}