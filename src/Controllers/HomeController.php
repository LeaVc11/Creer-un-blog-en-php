<?php

namespace App\Controllers;

class HomeController extends AbstractController
{
    public function index(): void
    {
        $this->render('accueil.view');
        $this->render('Articles/articles.view');
        $this->render('login');
        $this->render('register');

    }



}