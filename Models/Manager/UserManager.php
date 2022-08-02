<?php

namespace App\Models;

use App\Models\Manager\DbManager;
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
            if(password_verify($password, $resultat['password']))
                $user = new User($resultat['login'], $resultat['password'], $resultat['id']);
        }
        return $user;
    }
//    private function getPasswordUser($login){
//        $req = "SELECT password FROM user WHERE login = :login";
//        $stmt = $this->getBdd()->prepare($req);
//        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
//        $stmt->execute();
//        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $resultat['password'];
//    }
//
//    public function validCombination($login,$password){
//        $passwordBD = $this->getPasswordUser($login);
//        return password_verify($password,$passwordBD);
//    }
//
//    public function activeAccount($login){
//        $req = "SELECT est_valide FROM user WHERE login = :login";
//        $stmt = $this->getBdd()->prepare($req);
//        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
//        $stmt->execute();
//        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return ((int)$resultat['est_valide'] === 1) ? true : false;
//    }


}