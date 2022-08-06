<?php

namespace App\controllers\Security;


use App\models\Manager\UsernameManager;
use App\models\User;


class SecurityController
{
    // Injection du manager userManager
    private $userManager;

    public function __construct()
    {
        // Initialiser mon manager pour pouvoir l'appeler
        $this->userManager = new UsernameManager();
    }
    public function login()
    {
//        //Quand le utilisateur est connecté
        if (!empty($_SESSION['user'])){
            header('Location:dashboard.php');
        }
        $errors = [];
        $user = null;
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Je fais les vérifications de mon formulaire
            if (!empty($_POST)) {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                extract($post);

                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'L\'adresse email n\'est pas valide';
                }
            }

            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis';
            }
//     dd($errors);
        if(count($errors) == 0){

            $resultat = $this->userManager->login($_POST['email'], $_POST['password']);
            var_dump($resultat);
            die();
            if($resultat){
                if(Password_verify(bcrypt($password),$resultat['password'])){
                    $user = new User($resultat['email'], $resultat['password']);
                }
            }
            return $user;

        }
            // Affichage du formulaire de login
            require 'Views/security/login.php';
        }

}