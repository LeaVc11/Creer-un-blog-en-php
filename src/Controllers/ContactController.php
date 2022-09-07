<?php

namespace App\Controllers;

use App\Models\Class\Contact;
use App\models\Manager\ContactManager;
use App\Routing\Router;

class ContactController extends AbstractController
{
    private ContactManager $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
    }

    public function addContact(): void
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getFormErrors();
            if (count($errors) == 0) {
                $contact = new Contact(
                $_POST['email'],
                $_POST['username'],
                $_POST['message'],
                );
                $this->contactManager->addContact($contact);
                header('Location: ' . Router::generate("/dashboard"));
                exit();
            }
        }else{
        $this->render("Contact/addContact");
        }
    }

    private function getFormErrors($id = null): array
    {
        $errors = [];

        if (empty($_POST['email'])) {
            $errors[] = 'Veuillez saisir un email';
            $contact = $this->contactManager->getByEmail($_POST['email']);
        }
        if (empty($_POST['username'])) {
            $errors[] = 'Veuillez saisir un pseudo';
        }

        if (empty($_POST['message'])) {
            $errors[] = 'Veuillez saisir un message';
        }

        $_SESSION['flash'] = array_merge($_SESSION['flash'], $errors);

        return $errors;
    }

}



