<?php

namespace App\Controllers\Security;


use App\Models\Class\User;
use App\models\Manager\DbManager;
use App\models\Manager\UserManager;


class SecurityController extends DbManager
{
    private $userManager;

    /*
    * @param $userManager
    */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }


    public function logout()
    {
        // Détruit la session
        session_destroy();
        // Redirige l'utilisateur vers la page de login
        header('Location: login.php');
    }

    /*
    * @return void
    */
    public function login(): void
    {

        if (!empty($_SESSION['email'])) {
            header('Location: article.php');
        }
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            $errors = [];
            if(empty($_POST['username'])){
                $errors[] = 'Veuillez saisir un username';
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }

            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            }
            // J'appel mon manager pour enregistrer en base l'utilisateur
            // Je lui passe l'utilisateur que je souhaite ajouter en paramètre
            $loggedUser = $this->userManager->login($email, $password);

            // Si jamais j'ai un utilisateur :
            // C'est ok je l'ajoute dans ma session et je redirige vers une page sécurisée
            if ($loggedUser) {
                $_SESSION['user'] = serialize($loggedUser);
                header('Location: articles');
            } else {
                // Sinon, les identifiants ne sont pas correctes
                $errors[] = 'Identifiants incorrects';
            }
            $role = 'user';

            if ($_POST['isAdmin'] == 'on') {
                $role = "admin";
//                header('Location: Admin/dashboard.php');
            }

        }
        require "Views/Security/login.php";
    }

    /**
     * @return void
     */
    public function register(): void
    {
//        var_dump($_POST);
//        die();
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }
            if(empty($_POST['username'])){
                $errors[] = 'Veuillez saisir un nom d\'utilisateur';
            }
            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            } elseif (strlen($password) < 5) {

                $errors[] = 'Veuillez saisir 5 caractères pour le mot de passe';
            }
            // Si j'ai pas d'erreurs je vais aller vérifier si il n'y a pas un utilisateur qui a
            // Cet username et ce password
            if (count($errors) == 0) {
                $testByEmail = $this->userManager->testExistUserByEmail($_POST['email']);

                if ($testByEmail) {
                    $errors[] = 'Email déjà existant !';
                }
            }
            // Aucune erreur, je vais enregistrer mon utilisateur
            if (count($errors) == 0) {

                $role = 'user';

                if ($_POST['isAdmin'] == 'on') {
                    $role = "admin";
                }
                // Je cré un nouvel objet utilisateur sans id. Ce dernier sera généré par la BDD
                $user = new User($_POST['email'], $_POST['password'], $role);

                // J'appel mon manager pour enregistrer en base l'utilisateur
                // Je lui passe l'utilisateur que je souhaite ajouter en paramètre
                $this->userManager->register($user);
//
//                 Mon utilisateur est enregistré, je redirige donc vers le login
                header('Location: ../security/login');
            }

        }
        require "Views/Security/register.php";

    }

}