<?php

namespace App\Controllers;

use App\Models\Class\User;
use App\models\Manager\UserManager;
use App\Routing\Router;

class ContactController extends AbstractController
{
    private UserManager $userManager;

    /*
    * @param $userManager
    */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function formContact()
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
            header('Location:'. Router::generate("/contact"));
            exit();
        }
        $this->render('Contact/formContact');

    }
    private function getFormErrors($id = null): array
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = 'Veuillez saisir un titre';
            $article = $this->articleManager->getByTitle($_POST['title']);

            if (!is_null($article) && $article->getId() != $id) {
                $errors[] = 'Un article avec ce titre existe déjà !';
            }
        }

        if (empty($_POST['chapo'])) {
            $errors[] = 'Veuillez saisir un chapo';
        }

        if (empty($_POST['content'])) {
            $errors[] = 'Veuillez saisir du contenu';
        }

        if (empty($_POST['author'])) {
            $errors[] = 'Veuillez saisir un auteur';
        }

        if (empty($_POST['slug'])) {
            $errors[] = 'Veuillez saisir un slug';
        }

        $_SESSION['flash'] = array_merge($_SESSION['flash'], $errors);

        return $errors;
    }
}