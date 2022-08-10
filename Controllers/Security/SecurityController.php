<?php

namespace App\controllers\Security;


use App\entity\User;
use App\models\Manager\UserManager;


class SecurityController
{
    // Injection du manager userManager
    private $userManager;

    public function __construct()
    {
        // Initialiser mon manager pour pouvoir l'appeler
        $this->userManager = new UserManager();
    }


    public function login()
    {

        $errors = [];
        $user = null;
//        var_dump($_POST);
//        die();
//        dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
                } elseif (strlen($_POST['password']) < 5) {

                    $errors[] = 'Veuillez saisir 5 caractères pour le mot de passe';
                }


//     dd($errors);
                // Aucune erreur, je vais enregistrer mon utilisateur
                if (count($errors) == 0) {

//dd($resultat);
//                $resultat = $this->userManager->login($_POST['email'],$_POST['password']);
//                //if(password_verify(password, hash))
//                if ($resultat) {
//                    //var_dump($resultat['password']);die();
//                    if (md5($_POST['password']) === $resultat['password']) {
//                        $user = new User($resultat['id'], $resultat['email'],$resultat['password']);
//                    }
//                }
//
//                return $user;
                    $role = 'user';

                    if ($_POST['isAdmin'] == 'on')
                        $role = 'administrator';
                    // Je cré un nouvel objet utilisateur sans id. Ce dernier sera généré par la BDD
                    $user = new User($_POST['email'], $_POST['password'], $role);
//
//                    if ($customer) {
////                        var_dump($customer['password']);die();
//                        if (md5($_POST['password']) === $customer['password']) {
//                            $user = new User($custonmer['id'], $custonmer['email'], $customer['password'], $custonmer['role'],);
//                        }
//                    }
                    // J'appel mon manager pour enregistrer en base l'utilisateur
                    // Je lui passe l'utilisateur que je souhaite ajouter en paramètre
                    $this->userManager->login($email, $password, $role);

                }

            }
            // Affichage du formulaire de login
            require 'Views/security/login.php';
        }

    }
}