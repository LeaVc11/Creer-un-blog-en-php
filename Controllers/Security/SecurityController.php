<?php
namespace App\controllers\Security;

class SecurityController {

    private $userManager;

    public function __construct(){
        $this->userManager = new \App\models\UserManager();
    }

    public function login(){

        $errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(empty($_POST['username'])){
                $errors[] = 'Veuillez saisir un username';
            }

            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un password';
            }

            if(count($errors) == 0){
                $resultat = $this->userManager->login($_POST['username'], $_POST['password']);

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
