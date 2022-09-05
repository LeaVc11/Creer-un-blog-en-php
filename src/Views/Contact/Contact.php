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
<section class="d-flex justify-content-center align-content-center w-100 h-100 col-md" id="contact">
    <div class="container ">

        <h1 class="text-center mb-3 p-5">Me contacter</h1>
        <form method="POST" action="<?= Router::generate("/contact") ?>"
              enctype="multipart/form-data">
            <div class="row m-5">
                <div class="col text-primary fw-bold ">
                    <input type="text" class="form-control" id="email"
                           name="email" placeholder="Votre email"
                           value="<?= $contact->getEmail() ?>">
                </div>
                <div class="col text-primary fw-bold ">
                    <input type="text" class="form-control" id="username"
                           name="username" placeholder="Votre username"
                           value="<?= $contact->getUsername() ?>">>
                </div>
            </div>
            <div class="row m-5">
                <div class="col text-primary fw-bold">
                    <textarea name="content" class="form-control" id="content" cols="30"
                              rows="10" placeholder="Votre message"
                              value="<?= $contact->getMessage() ?>">></textarea>
                </div>
            </div>
            <div class="row m-5">
            </div>
            <div class=" text-center">
                <button class="btn btn-warning text-dark text-center mb-2  rounded-1 border "
                        type="submit">Valider
                </button>
            </div>

        </form>
    </div>
</section>

