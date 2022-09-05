<?php

namespace App\models\Manager;

class FlashManager
{
    public static function displayFlash():void
    {
        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $flash) {
                echo "<div class='alert alert-primary'>$flash</div>";
            }
            $_SESSION['flash'] = [];
        }
    }
}