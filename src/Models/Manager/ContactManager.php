<?php

namespace App\models\Manager;

use App\Models\Class\Contact;


class ContactManager extends DbManager
{
    private array $listContact = [];
    public function addContact(Contact $contact)
    {
        $req = $this->getBdd()->prepare("INSERT INTO `contact`(`email`,`username`,`message`)
      VALUE (:email,:username ,:message)");
        $req->execute([
            'email' => $contact->getEmail(),
            'username' => $contact->getUsername(),
            'message' => $contact->getMessage(),
        ]);
    }

    public function findById($id): ?Contact
    {
        $contact = null;
        $query = $this->getBdd()->prepare("SELECT * FROM contact WHERE id = :id");
        $query->execute(['id' => $id]);
        $contactFromBdd = $query->fetch();
        if ($contactFromBdd) {
            $contact = new Contact(
                $contactFromBdd['id'],
                $contactFromBdd['email'],
                $contactFromBdd['username'],
                $contactFromBdd['message']);
        }

        return $contact;
    }

    public function getByEmail($email): ?Contact
    {
        $contact = null;
        $query = $this->getBdd()->prepare("SELECT * FROM `contact` WHERE email = :email");
        $query->execute(['email' => $email]);
        $contactFromBdd = $query->fetch();
        if ($contactFromBdd) {
            $contact = new Contact(
                $contactFromBdd['id'],
                $contactFromBdd['image_link'],
                $contactFromBdd['chapo'],
                $contactFromBdd['title']);
        }
        return $contact;
    }
    public function loadingContacts($id): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM `contact` WHERE id = :id ");
        $req->execute(['id'=> $id]);
        $listContacts = $req->fetchAll();

        foreach ($listContacts as $listContact) {
            $contactObject= $this->createdObjectContact($listContact);
            $listContacts[] = $contactObject;
        }
        return $listContacts;
    }
    private function createdObjectContact(array $contact): Contact
    {
        return new Contact(
            $contact['id'],
            $contact['email'],
            $contact['username'],
            $contact['message'],
        );
    }
}