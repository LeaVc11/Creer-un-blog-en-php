<?php

namespace App\models\Manager;

class UserManager extends DbManager
{
    public function login($email, $password)
    {
//        var_dump($email);
//        var_dump($password);
        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $resultat = $req->execute([
            'email' => $email
        ]);
//var_dump($req->fetch);
//die();

        $resultat = $req->fetch();

        return $resultat;


    }


}