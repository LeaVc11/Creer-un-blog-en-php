<?php

namespace App\Controllers;

class HomeController extends AbstractController
{
    public function index(): void
    {
        $this->render('accueil');
        $this->render('articles');
        $this->render('formContact');
        $this->render('login');
        $this->render('register');

    }



}