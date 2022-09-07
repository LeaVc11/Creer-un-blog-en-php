<?php

namespace App\models\Manager;

use App\Models\Class\Contact;
use PDO;


class ContactManager extends DbManager
{
    public function addContact(Contact $contact)
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

    public function getByEmail($email): ?Contact
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
    public function loadingComments($id): ?array
    {
        $req = $this->getBdd()->prepare("SELECT * FROM `comment` WHERE id = :id");
        $req->execute(['id' => $id]);
        $result = $req->fetchAll();
        $listContacts = [];
        foreach ($result as $contact) {
            $contactObject = $this->createdObjectContact($contact);
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
    public function findById($id): ?Contact
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
                $contactFromBdd ['content']);
        }
        return $contact;
    }
    public function deleteContact(Contact $contact)
    {
        $req = $this->getBdd()->prepare('DELETE FROM `contact` WHERE id = :id');

        $req->execute(['id' => $contact->getId()]);
    }

}