<?php

namespace App\Controllers;


class HomeController
{

    public function __construct()
    {
        if (empty($_SESSION['user'])) {
            header('Location: Login');
        }
    }

    public function displayDashboard()
    {
        $user = $_SESSION['user'];
        require 'Views/Admin/dashboard.php';
    }

}