<?php

namespace App\Controllers;

class ExceptionController extends AbstractController
{
    public function pageIntrouvable(): void
    {
        $message = null;
        $message = 'Page introuvable (peut être supprimé ?)';

        http_response_code(404);

        $this->render("Errors/404");


    }
}