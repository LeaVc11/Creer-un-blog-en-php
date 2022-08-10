<?php

namespace App\controllers\Security;


use App\models\Manager\UserManager;
use App\models\User;


class SecurityController
{
    // Injection du manager userManager
    private $userManager;

    public function __construct()
    {
        // Initialiser mon manager pour pouvoir l'appeler
        $this->userManager = new UserManager();
    }


    public function login(): void
    {
//        //Quand le utilisateur est connecté
        if (!empty($_SESSION['user'])) {
            header('Location:homePage.php');
        }
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
            // Si j'ai pas d'erreurs, je tempte une connexion
            if (count($errors) == 0) {
                // J'appel mon utilisateur Manager pour vérifier si un utilisateur existe
                // avec le couple id/password saisie.
                $loggedUser = $this->userManager->login($_POST['email'], $_POST['password']);

                // Si jamais j'ai un utilisateur :
                // C'est ok je l'ajoute dans ma session et je redirige vers une page sécurisée
                if ($loggedUser) {
                    $_SESSION['user'] = serialize($loggedUser);
                    header('Location: loadingArticles');
                } else {
                    // Sinon, les identifiants ne sont pas correctes
                    $errors[] = 'Indentifiants incorrects';
                }
            }
        }
        // Affichage du formulaire de login
        require 'Views/security/login.php';
    }



    /**
     * @return void
     */
    public function register(): void
    {
        $errors = [];
        $lastSaisie = null;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Je vérifie tous les champs de mon formulaire
            if(empty($_POST['email'])){
                $errors[] = 'Veuillez saisir un email';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Veuillez saisir un email valide';
            } else {
                $lastSaisie['email'] = $_POST['email'];
            }

            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un password';
            } elseif (strlen($_POST['password'])<8){

                $errors[] = 'Veuillez saisir 8 caractères pour le mot de passe';
            }

            // Si j'ai pas d'erreurs je vais aller vérifier si il n'y a pas un utilisateur qui a
            // Cet username et ce password
            if(count($errors) == 0){

                $testByEmail = $this->userManager->testExistUserByEmail($_POST['email']);

                if($testByEmail){
                    $errors[] = 'Email déjà existant !';
                    unset($lastSaisie['email']);
                }

                // Aucune erreur, je vais enregistrer mon utilisateur
                if(count($errors) == 0){

                    // Je cré un nouvel objet utilisateur sans id. Ce dernier sera généré par la BDD
                    $user = new User( $_POST['email'], $_POST['password']);

                    // J'appel mon manager pour enregistrer en base l'utilisateur
                    // Je lui passe l'utilisateur que je souhaite ajouter en paramètre
                    $this->userManager->register($user);

                    // Mon utilisateur est enregistré, je redirige donc vers le login
                    header('Location: security/login');
                }
            }
        }
        require "Views/security/register.php";
    }

}