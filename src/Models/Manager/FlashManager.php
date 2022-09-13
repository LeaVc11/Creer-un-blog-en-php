<?php

namespace App\Models\Manager;

class FlashManager
{
    public static function displayFlash(): void
    {
        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $flash) {
                echo "<div class='text-dark text-center fw-bold mt-1 alert alert-danger'>$flash</div>";
            }
            $_SESSION['flash'] = [];
        }
    }
    public static function displayFlashSuccess(): void
    {
        if (!empty($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $success) {
                echo "<div class='text-dark text-center fw-bold  mt-4 alert alert-success'>$success</div>";
            }
            $_SESSION['success'] = [];
        }
    }
    public static function addSuccess(string $messageSuccess): void
    {
        $_SESSION['success'][]=$messageSuccess;
    }





}


