<?php

use App\Models\Manager\FlashManager;
use App\Routing\Router;
if (isset($_SESSION['user'])){
    $user =unserialize($_SESSION['user']);
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon blog</title>
    <!--    bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--    css-->

    <link rel="stylesheet" href="<?= Router::generate('/public')?>/css/style.css">

    <link rel="icon" type="image/jpg" href="<?= Router::generate('/public')?>/images/Maphoto">

    <link href="<?= Router::generate('/public')?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />


</head>
<body>

<!--Section Barre de navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  " id="navbarColor01">
            <ul class="navbar-nav w-100 d-flex justify-content-start ">
                <li class="nav-item">
                    <a class="nav-link " href="<?= Router::generate("/") ?>">Carine VINAGRE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Router::generate("/articles") ?>">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=" <?= Router::generate("/contact/addContact") ?>">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav w-100 d-flex justify-content-end">
                <li class="nav-item">
                    <?php
                    if (!isset($_SESSION['user'])) {
                        ?>
                        <a class="text-decoration-none text-secondary" href="<?= Router::generate("/login") ?>">Connexion</a> |

                        <a class="text-decoration-none text-secondary" href="<?= Router::generate("/register") ?>">Inscription</a>
                        <?php
                    } else {
                        ?>
                        <a class="text-decoration-none text-secondary" href="<?= Router::generate("/logout") ?>">Déconnexion</a> |
                        <?php
                        if ($user->getRole() == 'admin'){
                        ?>
                        <a class="text-decoration-none text-secondary" href="<?= Router::generate("/dashboard") ?>">Liste</a>
                        <?php
                        }
                    }
                    ?>

                </li>
            </ul>
        </div>
    </div>
</nav>
<div>
    <?php
    FlashManager::displayFlashSuccess();
    FlashManager::displayFlash();
    ?>
</div>

<?= $content ?>
<!--section footer-->

<footer class="bg-light text-center mt-5 p-5 ">
    <span class="mb-3 mb-md-0 text-muted text-decoration-none lh-1 fw-bold">Tout Droits réservés © 2022 Carine Vinagre</span>
    <div id="contact">
        <p> Si vous voulez me contacter, n'hésitez pas à m'envoyer un email à <a
                    href="../../../index.php"><b class="mail">vcarine.dev@gmail.com</b></a></p>
    </div>
</footer>
<!--    js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="<?= Router::generate('/public/')?>js/app.js"></script>
</body>
</html>