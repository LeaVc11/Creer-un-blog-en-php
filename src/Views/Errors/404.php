<?php

use App\Routing\Router;

?>

<div class="container mt-5 p-5">
    <h1 class="text-center text-danger">Page non trouvée !</h1>
    <img src="<?= Router::generate('/public/') ?>images/photo/erreur404.png"
         class="text-center w-75 m-5"
         alt="image">

    <p class="lead text-center">Le serveur n'a pas pu trouver la page que vous avez demandé et à retourner une erreur 404.</p>

</div>