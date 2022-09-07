<?php

namespace App\models\Manager;

use App\Models\Class\Contact;


class ContactManager extends DbManager
{
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

}