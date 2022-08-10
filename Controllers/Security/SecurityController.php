<?php

namespace App\Controllers\Security;


use App\models\Manager\DbManager;
use App\models\Manager\UserManager;
use App\models\User;


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
        if (!empty($_SESSION['email'])) {
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
    /**
     * @return void
     */
    public function register(): void
    {
        if (!empty($_SESSION['email'])) {
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
            }elseif (strlen($_POST['password'])<5){

                $errors[] = 'Veuillez saisir 5 caractères pour le mot de passe';
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
                    $this->userManager->register();

                    // Mon utilisateur est enregistré, je redirige donc vers le login
                    header('Location: security/login');
                }
            }
        }
        require "Views/Security/register.php";
    }

}
