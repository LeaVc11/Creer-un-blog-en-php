<?php

namespace App\Models\Manager;

use App\Models\Class\Contact;
use PDO;


class ContactManager extends DbManager
{
    private array $contacts = [];

    public function addContact(Contact $contact):void
    {
        $req = $this->getBdd()->prepare("INSERT INTO `contact`(`id`,`email`,`username`,`message`)
      VALUE (:id,:email,:username ,:message)");
        $req->execute([
            'id'=>$contact->getId(),
            'username' => $contact->getUsername(),
            'email' => $contact->getEmail(),
            'message' => $contact->getMessage(),
        ]);
    }

    public function getByEmail(string $email): ?Contact
    {
        $contact = null;
        $query = $this->getBdd()->prepare("SELECT * FROM `contact` WHERE email = :email");
        $query->execute(['email' => $email]);
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

    public function loadingContacts(): array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM contact  ");
        $req->execute();
        $contacts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ( $contacts  as $contact) {
            $c = $this->createdObjectContact($contact);
            $this->contacts[] = $c;
        }
        return $this->contacts;
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
    public function findById(int $id): ?Contact
    {
        $contact = null;
        $query = $this->getBdd()->prepare("SELECT * FROM contact WHERE id = :id");
        $query->execute(['id' => $id]);
        $contactFromBdd = $query->fetch();
        if ($contactFromBdd ) {
            $contact = new Contact(
                $contactFromBdd ['id'],
                $contactFromBdd ['email'],
                $contactFromBdd ['status'],
                $contactFromBdd ['message']);
        }
        return $contact;
    }
    public function deleteContact(Contact $contact):void
    {
        $req = $this->getBdd()->prepare('DELETE FROM `contact` WHERE id = :id');

        $req->execute(['id' => $contact->getId()]);
    }

}