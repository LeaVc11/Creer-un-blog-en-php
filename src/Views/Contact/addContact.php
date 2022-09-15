<?php

use App\Routing\Router;

?>

<section class="d-flex justify-content-center align-content-center w-100 h-100 col-md" id="contact">
    <div class="container ">

        <h1 class="text-center my-3 ">Me contacter</h1>
        <form method="POST" action="<?= Router::generate("/contact/addContact") ?>"
              enctype="multipart/form-data">
            <div class="row m-5">
                <div class="col text-primary fw-bold">
                    <input type="text" class="form-control"
                           id="title" name="email" placeholder="Votre email">
                </div>
                <div class="col text-primary fw-bold">
                    <input type="text" class="form-control"
                           id="title" name="username" placeholder="Votre pseudo">
                </div>

            </div>
            <div class="row m-5">
                <div class="col text-primary fw-bold">
                    <div class="col text-primary fw-bold">
                        <textarea name="message" class="form-control"
                                  id="content" cols="30"
                                  rows="10"
                        placeholder="Votre message"></textarea>
                    </div>
            </div>
            <div class=" text-center">
                <button class="btn btn-warning text-dark text-center my-2  rounded-1 border "
                        type="submit">Valider
                </button>
            </div>

        </form>
    </div>
</section>

