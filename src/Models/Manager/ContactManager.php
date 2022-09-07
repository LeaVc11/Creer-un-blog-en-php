<?php

namespace App\models\Manager;

use App\Models\Class\Contact;


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



}