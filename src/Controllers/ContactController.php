<?php

namespace App\Controllers;

use App\Models\Class\Contact;
use App\Models\Manager\ContactManager;
use App\Models\Manager\FlashManager;
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
            $errors = $this->getErrors();

            if (count($errors) == 0) {
                $contact = new Contact(
                    null,
                    htmlspecialchars($_POST['email']),
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['message']),
                );
                FlashManager::addSuccess('Votre message a été modifié');
                $this->contactManager->addContact($contact);

                header('Location: ' . Router::generate("/articles"));
                exit();
            }
            header('Location: ' . Router::generate("/contact/addContact"));
            exit();
        }
        $this->render("contact/addContact");
    }

    private function getErrors(): array
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

        $_SESSION['flash'] = $errors;

        return $errors;
    }

    public function deleteContact(int $id): void
    {
        $contact = $this->contactManager->findById($id);

        $this->contactManager->deleteContact($contact);

        FlashManager::addSuccess('Votre message a été supprimé');

        header('Location: ' . Router::generate("/dashboard"));

    }

}



