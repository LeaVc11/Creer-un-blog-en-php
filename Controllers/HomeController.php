<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        require "Views/accueil.view.php";
    }

}