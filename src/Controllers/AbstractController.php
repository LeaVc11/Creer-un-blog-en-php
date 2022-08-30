<?php

namespace App\Controllers;

use Exception;

abstract class AbstractController
{
    protected function render(string $view, array $variables = [])
    {
        try {

            extract($variables);
            ob_start();
            require  __DIR__ . '/../Views/' . $view . '.php';
            $content = ob_get_clean();

            require __DIR__ . '/../Views/template.php';

        } catch (Exception $e) {
        }
    }
}