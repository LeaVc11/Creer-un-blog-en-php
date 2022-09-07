<?php

namespace App\models\Manager;

class FlashManager
{
    public static function displayFlash(): void
    {
        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $flash) {
                echo "<div class='text-dark text-center mt-2 mb-2 alert alert-danger'>$flash</div>";
            }
            $_SESSION['flash'] = [];
        }
    }
    public static function displayFlashSuccess(): void
    {
        if (!empty($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $flashsuccess) {
                echo "<div class='text-dark text-center mt-2 mb-2 alert alert-success'>$flashsuccess</div>";
            }
            $_SESSION['success'] = [];
        }
    }




}


