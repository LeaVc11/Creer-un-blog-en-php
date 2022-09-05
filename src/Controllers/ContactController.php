<?php

namespace App\Controllers;

use App\models\Manager\ContactManager;
use App\Routing\Router;

class ContactController extends AbstractController
{
    private ContactManager $contactManager;

    /*
    * @param $userManager
    */
    public function __construct()
    {
        $this->contactManager = new ContactManager();
    }

    public function contact(): void
    {
        if (!empty($_SESSION['email'])) {
            header('Location:' . Router::generate("/articles"));
            exit();
        }
        if (!empty($_POST)) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            extract($post);

            $errors = [];
            if (empty($_POST['username'])) {
                $errors[] = 'Veuillez saisir un username';
            }
            if (empty($_POST['message'])) {
                $errors[] = 'Veuillez saisir un message';
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }
            $this->contactManager->contact();
            header('Location:' . Router::generate("/contact"));
            exit();
        }

        $this->render('Contact/contact');
    }

}

