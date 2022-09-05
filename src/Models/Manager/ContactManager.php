<?php

namespace App\models\Manager;

use App\Models\Class\Contact;

class ContactManager extends DbManager
{

    public function contact(Contact $contact)
    {
        dd(1);
        $req = $this->getBdd()->prepare("INSERT INTO `contact`(`email`,`username`,`message`)
      VALUE (:email,:username ,:message)");
      $req->execute([
          'email'=> $contact->getEmail(),
          'username'=> $contact->getUsername(),
          'message'=> $contact->getMessage(),
      ]);

    }

}