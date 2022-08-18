<?php

require_once "Models/Class/Article.php";


ob_start(); ?>

<!--section projet-->

<section class="border-bottom mb-5">
    <div class="container m-5 pb-5">
        <p class="card-text text-center text-primary fw-bold">Mes projets réalisés lors de ma formation de Développeur
            d'application
        </p>
        <p class="card-text text-center text-primary fw-bold">PHP/Symfony et mes créations personnelles.
        </p>

        <!--     card-->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">


            <?php

            //var_dump($articles);
            //die();
            for ($i = 0; $i < count($articles); $i++) {
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <img src="Public/images/<?= $articles[$i]->getImageLink() ?>" class="w-75 mb-5 p-3"
                                 alt="">
                            <p class="card-text text-center fw-bold">
                                <a class=" btn btn-primary text-center m-1 text-decoration-none"
                                   href="<?= URL ?>article/s/<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getContent() ?></a>
                            </p>
                        </div>

                    </div>

                </div>
            <?php } ?>

</section>

<!--contact-->

<section class="d-flex justify-content-center align-content-center w-100 h-100 m-3 p-3 " id="contact">
    <div class="card shadow  p-4 rounded d-flex justify-content-center  ">

        <h1 class="text-center mb-3">Me contacter</h1>
        <form class="d-flex justify-content-center  w-100 h-100 ">
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

                <input class=" button-sub hover-overlay text-dark border border-2 btn btn-outline-warning  fw-bold mt-2  "
                       type="submit"
                       value="ENVOYER">
            </fieldset>
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>


