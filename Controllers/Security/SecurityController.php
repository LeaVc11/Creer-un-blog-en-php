<?php

namespace App\Controllers\Security;


class SecurityController
{
    /**
     * @return void
     */
    public function login(): void
    {
//        dd($_POST);
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);
            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }

            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            }
//            var_dump($errors);
//            if ($user){
//                // on verifie les identifiant et on connect le user si c'est bon
//            }
            $errors[]
        require "Views/Security/login.php";
    }
}
