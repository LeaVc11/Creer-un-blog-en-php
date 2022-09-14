<?php

use App\Routing\Router;

?>

<div class="container mt-5 p-5">
    <img src="<?= Router::generate('/public/') ?>images/photo/401-Unauthorized.jpg"
         class="text-center w-75 m-5"
         alt="image">

    <p class="lead text-center">Vous n'avez pas les autorisations pour accéder à cette page.</p>

</div>