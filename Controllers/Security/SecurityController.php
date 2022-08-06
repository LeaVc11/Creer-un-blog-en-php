<?php

namespace App\controllers\Security;


use App\models\Manager\UsernameManager;


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
        // variables qui servira à stocker les erreurs de validation du formulaire


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Je fais les vérifications de mon formulaire
            if (!empty($_POST)) {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                extract($post);
                $errors = [];

                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'L\'adresse email n\'est pas valide';
                }
//            if (empty($_POST['email'])) {
//                $errors[] = 'Veuillez saisir un email';
            }
            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis';
            }
            var_dump($errors);

        }

        // Affichage du formulaire de login
        require 'Views/security/login.php';
    }
}