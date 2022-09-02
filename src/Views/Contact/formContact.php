<?php

use App\Routing\Router;

?>
<?php
if (!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?= $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<section class="d-flex justify-content-center align-content-center w-100 h-100 m-3 p-3 " id="contact">
    <div class="card shadow  p-4 rounded d-flex justify-content-center  ">

        <h1 class="text-center mb-3">Me contacter</h1>
        <form method="GET" action="<?= Router::generate("/contact") ?>" class="d-flex justify-content-center  w-100 h-100 ">
            <fieldset>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="nom" placeholder="Votre adresse email">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Votre Nom">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Votre Prénom">
                    </div>
                </div>
                <div class="input-group-prepend mb-3"></div>
                <textarea class="form-control" aria-label="Message" placeholder="Votre message"></textarea>

                <button class=" button-sub hover-overlay text-dark border border-2 btn btn-outline-warning
                 fw-bold mt-2  " type="submit">Envoyer</button>

            </fieldset>
        </form>
    </div>
</section>

