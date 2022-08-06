<?php

namespace App\models\Manager;

use PDO;

class UsernameManager extends DbManager
{
    public function login($email, $password, $errors)
    {

        var_dump($email);
        var_dump($password);

        $user = null;
        $req = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();

//        var_dump($req);
//        die();
        $user = $req->fetch();

        if ($user && password_verify($password, $user['password'])) {
//            if (password_verify($password, $user['password'])) {
//                $user = new User($user['email'], $user['password']);
        }
        $errors[] = 'Mauvais identifiants';
    }

//return $user;



}