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
            $success = $this->getFormSuccess();
            if (count($errors) == 0) {
                $contact = new Contact(

                    $_POST['id'],
                    $_POST['email'],
                    $_POST['username'],
                    $_POST['message'],
                );
                $this->contactManager->addContact($contact);
                header('Location: ' . Router::generate("/articles"));
                exit();
            }
            header('Location: ' . Router::generate("/contact/addContact"));
            exit();
        }
        $this->render("contact/addContact");
    }
    public function deleteContact($id): void
    {
        $contact = $this->contactManager->findById($id);

        $this->contactManager->deleteContact($contact);
        header('Location: ' . Router::generate("/dashboard"));
        exit();
    }
    private function getFormErrors(): array
    {
        $errors = [];

        if (empty($_POST['email'])) {
            $errors[] = 'Veuillez saisir un email';
            $contact = $this->contactManager->getByEmail($_POST['email']);
            if (!is_null($contact) && $contact->getId() != null) {
                $errors[] = 'Un contact avec ce titre existe déjà !';
            }
        }
        if (empty($_POST['username'])) {
            $errors[] = 'Veuillez saisir un pseudo';
        }

        if (empty($_POST['message'])) {
            $errors[] = 'Veuillez saisir un message';
        }

        $_SESSION['flash']=$errors;

        return $errors;
    }
    private function getFormSuccess($id = null): array
    {
        $success = [];
        $contact = $this->contactManager->getByEmail($_POST['email']);
        if (!is_null($contact) && $contact->getId() != null && $id == null) {
            $success[] = 'Votre demande a été pris en compte !';
        }
        $_SESSION['success']=$success;

        return $success;
    }

}



