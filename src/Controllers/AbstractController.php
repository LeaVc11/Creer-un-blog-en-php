<?php

namespace App\Controllers;

use Exception;

abstract class AbstractController
{

    protected function render(string $view, array $variables = []): string|bool
    {
//        try {
//            extract($variables);
//            ob_start();
//            require '../Views/' . $view . '.php';
//
//            $content = ob_get_clean();
//
//            require __DIR__ . '/../Views/template.php';
//        } catch (Exception $e) {
//        }
        ob_start();
        extract($variables);
        include __DIR__ . "/Views/'.$view . '.php";

        return ob_get_clean();
    }
}