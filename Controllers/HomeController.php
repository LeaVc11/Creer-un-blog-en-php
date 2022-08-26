<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        $this->render('accueil.view');
        $this->render('articles.view');
        $this->render('accueil.view');
        $this->render('login');
        $this->render('register');

    }



}