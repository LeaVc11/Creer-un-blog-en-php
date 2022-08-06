<?php

namespace App\models\Manager;

use App\models\User;
use PDO;

class UsernameManager extends DbManager
{
    public function login($email, $password)
    {

        var_dump($email);
        var_dump($password);

        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $req->bindValue(':email', $email);
        $req->execute();


        $resultat = $req->fetch();

        if($resultat){
            if(password_verify($password, $resultat['password'])){
                $user = new User($resultat['email'], $resultat['password']);
            }
        }

        return $user;

    }




}