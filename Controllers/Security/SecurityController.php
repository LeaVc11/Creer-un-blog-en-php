<?php

namespace App\Controllers\Security;


use App\models\Manager\DbManager;



class SecurityController extends DbManager
{
    private $userManager;

    /**
     * @param $userManager
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }


    /**
     * @return void
     */
    public function login(): void
    {
        if (!empty($_SESSION['username'])) {
            header('Location: article.php');
        }
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

        }
        require "Views/Security/login.php";
    }

}
