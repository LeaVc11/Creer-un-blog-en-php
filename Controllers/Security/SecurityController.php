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

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Je fais les vérifications de mon formulaire
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
            var_dump($errors);

            if (count($errors) == 0) {
                $user = $this->userManager->login($_POST['email'], $_POST['password']);

//                var_dump($user);
                if (!is_null($user)) {
                    var_dump($user);
                    $_SESSION['user'] = serialize($user);
                    header('Location: dashboard.php');
                } else {
                    var_dump($errors);
                    $errors[] = 'Les identifiants sont incorrectes !';
                }

            }

            // Affichage du formulaire de login
            require 'Views/security/login.php';
        }
    }
}