<?php

use App\Routing\Router;


?>

<section class="d-flex justify-content-center align-content-center w-100 h-100 col-md">
    <div class="m-5 rounded-3 opacity-25 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">S'identifier</h1>
            <?= $message ?>

            <form class="form-bloc text-center " method="post" action="<?= Router::generate('/login') ?>">
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control"
                           name="email"
                           placeholder="Votre email"
                           value="<?= $email ?? ''; ?>"

                </div>
                <div class="form-groupe">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="password"
                           name="password"
                           placeholder="Votre password"/>
                </div>
                <div class="form-groupe  ">
                    <button class="btn btn-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                            type="submit">Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
