<?php
namespace App\Controllers\Security;

use App\Models\UserManager;

class SecurityController {

    private UserManager $userManager;

    public function __construct(){

        $this->userManager = new UserManager();
    }

    public function login(): void
    {

        $errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(empty($_POST['login'])){
                $errors[] = 'Veuillez saisir un login';
            }

            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un password';
            }

            if(count($errors) == 0){
                $resultat = $this->userManager->login($_POST['login'], $_POST['password']);

                if(!is_null($resultat)){
                    $_SESSION['user'] = serialize($resultat);
                    header('Location: index.php?controller=article&action=article');
                } else {
                    $errors[] = 'Les identifiants sont incorrectes !';
                }
            }

        }
        require 'Views/Security/login.php';
    }


}
