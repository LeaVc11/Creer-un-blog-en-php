<?php

namespace App\Controllers;


use App\Models\Class\User;
use App\Models\Manager\FlashManager;
use App\Models\Manager\UserManager;
use App\Routing\Router;


class SecurityController extends AbstractController
{
    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }
    public function login(): void
    {
        if (!empty($_SESSION['user'])) {
            header('Location:' . Router::generate("/articles"));
            exit();
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
            $loggedUser = $this->userManager->login($email, $password);

            if ($loggedUser) {

                $_SESSION['user'] = serialize($loggedUser);
                if ($loggedUser->isAdmin()) {
                    FlashManager::addSuccess('Vous êtes connecté(e)');
                    header('Location: ' . Router::generate("/dashboard"));
                    exit();
                }
                FlashManager::addSuccess('Vous êtes connecté(e)');
                header('Location:' . Router::generate("/articles"));
                exit();
            } else {

                $errors[] = 'Identifiants incorrects';
            }

            $_SESSION['flash'] = $errors;

            header('Location:' . Router::generate("/login"));
            exit();
        }
        $this->render('Security/login');
    }

    public function logout():void
    {
        session_destroy();
        header('Location:' . Router::generate("/login"));
        exit();
    }
    public function register(): void
    {

        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);
            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }
            if (empty($_POST['username'])) {
                $errors[] = 'Veuillez saisir un nom d\'utilisateur';
            }
            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            } elseif (strlen($password) < 5) {

                $errors[] = 'Veuillez saisir 5 caractères pour le mot de passe';
            }
            $_SESSION['flash'] = $errors;

            if (count($errors) == 0) {
                $testByEmail = $this->userManager->testExistUserByEmail($_POST['email']);

                if ($testByEmail) {
                    $errors[] = 'Email déjà existant !';
                }
            }
            if (count($errors) == 0) {
                $role = 'user';
                if ($_POST['isAdmin']) {
                    $role = "admin";
                }
                $_SESSION['email'] = $_POST['email'];

                $user = new User(null, $_POST['email'], $_POST['username'], $_POST['password'], $role);
                $this->userManager->register($user);
                FlashManager::addSuccess('Votre inscription a été enregistré');
                header('Location:' . Router::generate("/login"));
                exit();
            }
        }
        $this->render('Security/register');
    }
}