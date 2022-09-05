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

    public function contact(): void
    {
        $contact = new Contact();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getFormErrors();

        }
        $this->render('Contact/contact');

    }
    private function getFormErrors($id = null): array
    {
        $errors = [];

        if (empty($_POST['email'])) {
            $errors[] = 'Veuillez saisir un email';
            $contact= $this->contactManager->getByEmail($_POST['email']);
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



