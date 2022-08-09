<?php

namespace App\models\Manager;

use App\entity\User;

class UserManager extends DbManager
{
//    public function login($email,$role, $password)
//    {
////        var_dump($email);
////        var_dump($password);
//        $user = null;
//        // Je retrouve un utilisateur en fonction de son username
//        $user1 = $this->findByEmail($email);
//        if($user){
//            // Il a trouvé un utilisateur il vérifie si le hash correspond
//            if(password_verify($password,  $user->getPassword())){
//                $user = $user1;
//            }
//        }
//        $req = $this->getBdd()->prepare("INSERT INTO user ( email, role, password)
//        VALUES (:email,:role , :password )");
//        $resultat = $req->execute([
//            'email' => $email,
//            'password' => $password,
//            'role' => $role
//        ]);
////var_dump($req->fetch);
////die();
//
//
//        $resultat = $req->fetch();
//
//        return $resultat;
//
//
//    }

    public function login($email,$role, $password){

        // De base mon utilisateur est nulle
        $user = null;

        // Je retrouve un utilisateur en fonction de son email
        $user = $this->findByEmail($email);

        $req = $this->getBdd()->prepare("INSERT INTO user (email,role,password)
        VALUES (:email,:role, :password )");

        $res = $req->execute([

            'email'=> $email,
            'role'=>$role,
            'password'=> $password
        ]);

        $resultat = $req->fetch();
        if($resultat){
            if(password_verify($password, $resultat['password'])){
                $user = new User($resultat['email'], $resultat['password'], $resultat['role']);
            }
        }
    }

    // Selectionne un utilisateur en fonction de son username
    public function findByEmail($email) {
            $user = null;
            // Requete préparée
            $query = $this->getBdd()->prepare("SELECT * FROM user WHERE email = :email");
            $query->execute(['email'=> $email]);
            $userFromBdd = $query->fetch();

            // Transforme notre tableau en objet si l'on a un utilisateur avec ce username en BDD
            if($userFromBdd){
                $user = new User(
                    $userFromBdd['email'],
                    $userFromBdd['password'],
                    $userFromBdd['role'],
                    $userFromBdd['id']);
            }

            // Retourne null si pas d'utilisateur avec cet ID sinon retourne l'utilisateur
            return $user;
    }


}