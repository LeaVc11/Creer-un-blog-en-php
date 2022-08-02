<?php

namespace App\Models;


use App\models\Manager\DbManager;
use PDO;

class UserManager extends DbManager
{
    public function login($email, $password){

        dd($email);
        var_dump($username);
        var_dump($email);
        var_dump($password);
        die();
        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();


//        var_dump($req);
//        die();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
//            var_dump($resultat);
            if (password_verify($password, $resultat['password'])) {
                $user = new User($resultat['id'], $resultat['email'], $resultat['password']);
            }
        }
        return $user;

    }

}