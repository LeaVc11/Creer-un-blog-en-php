<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        require "Views/accueil.view.php";
        require "Views/Articles/articles.view.php";
        require "Views/Contact/formContact.php";
        require "Views/Security/login.php";
        require "Views/Security/register.php";
    }

}