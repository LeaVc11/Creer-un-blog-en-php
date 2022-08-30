<?php

namespace App\Controllers;

class ExceptionController
{
    public function pageIntrouvable(): void
    {
        $message = null;

        if($_GET['message']){
            if($_GET['message'] == 'article-not-found')
                $message = 'Article introuvable (peut être supprimé ?)';
        }
        http_response_code(404);

        require '../Views/errors/error.php';
    }
}