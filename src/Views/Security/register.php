
<?php

use App\models\Manager\FlashManager;
use App\Routing\Router;
;?>
<div class="container  ">
<?php FlashManager::displayFlash(); ?>
</div>
<section class="d-flex justify-content-center align-content-center w-100 h-100 col-md">
    <div class="m-5 rounded-3 opacity-25 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">Inscription</h1>

            <form class="form-bloc text-center " method="post" action="<?= Router::generate('/register') ?>">
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control"
                           name="email"
                           placeholder="Votre email"
                           value="<?= $email ?? ''; ?>"
                </div>
                <div class="form-groupe">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="text"
                           name="username"
                           placeholder="Votre username"/>
                </div
                <div class="form-groupe">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="password"
                           name="password"
                           placeholder="Votre password"/>
                </div

                <div class="form-groupe m-3 px-5 ">
                    <button class="button bg-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control form-control-lg" type="submit">Se connecter</button>
                </div>
            </form>
            <p class="text-secondary text-center m-3 px-3">Déjà sur mon blog ? <a href="<?= Router::generate('/login') ?>">Connectez-vous</a>
            </p>
        </div>
    </div>

</section>
