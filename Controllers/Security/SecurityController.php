<?php

namespace App\Controllers\Security;


class SecurityController
{
    /**
     * @return void
     */
    public function login(): void
    {
        $errors = [];
//        dd($_SERVER);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            var_dump('traitement des données');
//            var_dump($_POST);
//            dd($_POST);
            // JE VAIS APPELER MON USERMANAGER ET APPELER SA FONCTION LOGIN =>  QUI VA DONNE UN RESULTAT

            if (empty($_POST['email'])) {
                $errors[] = "Veuillez choisir un email";
            }
            if (empty($_POST['password']) || strlen($password) < 6) {
                $errors[] = "Veuillez choisir un password et mot de passe doit contenir au moins 6 caractères";
            }
//            var_dump($errors);
            if (count($errors) == 0) {
                $resultat = $this->userManager->login( $_POST['email'], $_POST['password']);
//            var_dump($resultat);
//            die();
                if (!is_null($resultat)) {
                    $_SESSION['user'] = serialize($resultat);
                    header('Location: article.view.php');
                } else {
                    $errors = "les identifiants sont incorrectes";
                }
            }
        }

        require "Views/security/login.php";
    }
}
