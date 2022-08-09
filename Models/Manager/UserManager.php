<?php

namespace App\models\Manager;

use App\entity\User;

class UserManager extends DbManager
{
    public function login($email,$role, $password)
    {
//        var_dump($email);
//        var_dump($password);
        $user = null;
        // Je retrouve un utilisateur en fonction de son username
        $user1 = $this->findByEmail($email);
        $user->setPassword(md5($user->getPassword(), PASSWORD_DEFAULT));
        $req = $this->getBdd()->prepare("INSERT INTO user ( email, role, password)
        VALUES (:email,:role , :password )");
        $resultat = $req->execute([
            'email' => $email->getEmail(),
            'password' => $password->getPassword(),
            'role' => $role->getRole()

        ]);
//var_dump($req->fetch);
//die();
        if($user){
            // Il a trouvé un utilisateur il vérifie si le hash correspond
            if(password_verify($password,  $user->getPassword())){
                $user = $user1;
            }
        }

        $resultat = $req->fetch();

        return $resultat;


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
    // Fonction retourne true si un utilisateur à déjà cet email
    // Sinon elle retourne false
    public function testExistUserByEmail($email){
        $user = $this->findByEmail($email);

        if($user){
            return true;
        } else {
            return false;
        }
    }

}