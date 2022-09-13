<?php

use App\Routing\Router;

?>

<div class="container mt-5">
    <h1 class="text-center text-danger">Page non trouvée !</h1>
    <h1 class="text-center text-danger w-50 mb-2"><img src="<?= Router::generate('/') ?>images/photo/erreur404.png" alt="erreur404">


    <p class="lead text-center">Le serveur n'a pas pu trouver la page que vous avez demandé et à retourner une erreur 404.</p>

</div>