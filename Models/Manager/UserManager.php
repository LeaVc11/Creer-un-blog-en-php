<?php

namespace App\models;

use App\models\Manager\DbManager;
use PDO;

class UserManager extends DbManager
{
    public function login($email, $password)
    {
        var_dump($email);
        var_dump($password);

        $request = $this->getBdd()->prepare('SELECT * FROM User WHERE email = :email');
        $request->bindValue(':email', $email, PDO::PARAM_STR);
        $request->execute();

        $user = $request->fetch();

        if ($user){
        }
        $errors[] = 'Mauvais identifiants';
//        if ($resultat){
//            if (password_verify($password, $resultat['$password'])){
//                $user = new User($resultat ['username'],$resultat ['password'], $resultat ['id']);
//            }
//        }
//
//      return $user;
    }
}