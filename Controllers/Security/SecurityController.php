<?php

namespace App\controllers\Security;


use App\entity\User;
use App\models\Manager\UserManager;


class SecurityController
{
    // Injection du manager userManager
    private $userManager;

    public function __construct()
    {
        // Initialiser mon manager pour pouvoir l'appeler
        $this->userManager = new UserManager();
    }


    public function login()
    {

        $errors = [];
        $user = null;
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Je fais les vérifications de mon formulaire
        if (!empty($_POST)) {

            //J'ai mis tout le code dans ce grand if(!empty($_POST))
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide';
            }
            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis';
            }


//     dd($errors);
            if (count($errors) == 0) {

                $resultat = $this->userManager->testExistUserByEmail($_POST['email']);
                //        //Quand le utilisateur est connecté
                if (!empty($_SESSION['user'])) {
                    header('Location:article.view.php');
                }

                $resultat = $this->userManager->login($_POST['email'], $_POST['password'],$_POST['role']);
                //if(password_verify(password, hash))
                if ($resultat) {
                    //var_dump($resultat['password']);die();
                    if (md5($_POST['password']) === $resultat['password']) {
                        $user = new User($resultat['id'], $resultat['email'], $resultat['role'],$resultat['password']);
                    }
                }

                return $user;

            }

        }
        // Affichage du formulaire de login
        require 'Views/security/login.php';
    }

}