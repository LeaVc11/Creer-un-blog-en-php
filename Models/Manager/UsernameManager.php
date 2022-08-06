<?php

namespace App\models\Manager;

use App\models\User;
use PDO;

class UsernameManager extends DbManager
{
    public function login($email, $password)
    {
//        var_dump($email);
//        var_dump($password);
        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $resultat = $req->execute([
            'email'=> $email
        ]);
//var_dump($req->fetch);
//die();

        $resultat = $req->fetch();
//        var_dump($resultat);
//        die();
//        if($resultat){
//            if(Password_verify( password_hash($password),$resultat['password'])){
//                $user = new User($resultat['email'], $resultat['password']);
//            }
//        }
//
//        return $user;

    }


}