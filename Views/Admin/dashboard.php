<?php

require_once "Models/Class/Article.php";


ob_start(); ?>

<!--section projet-->

<section class="border-bottom mb-5">
    <div class="container m-5 pb-5">
        <p class="card-text text-center text-primary fw-bold">Mes projets réalisés lors de ma formation de Développeur d'application
        </p>
        <p class="card-text text-center text-primary fw-bold">PHP/Symfony et mes créations personnelles.
        </p>

        <!--        <p class="fs-5 text-dark mb-md-5 mb-3 text-center">Le Portugal </p>-->

        <!--  carousel-->
        <div id="carouselExampleControls" class="carousel slide text-center " data-bs-ride="carousel">
            <div class="carousel-inner p-5">
                <div class="carousel-item active">
                    <img src="Public/images/htmlcss-logo-title.svg" class=" w-50 " alt="html&css">

                </div>
                <div class="carousel-item ">
                    <img src="Public/images/wordpress-blue.svg" class=" w-25 " alt="wordpress">


                </div>
                <div class="carousel-item ">
                    <img src="Public/images/php-1.svg" class=" w-50  " alt="blog">

                </div>
            </div>
            <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                <span class="visually-hidden ">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--     card-->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
            <?php

var_dump($articles);
die();
            for ($i = 0; $i < count($articles); $i++) {
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="public/images/<?= $articles[$i]->getImageLink() ?>" class="w-100 p-3" alt="html&css">
                            <p class="card-text text-center fw-bold"><a  class="text-decoration-none" href="<?= URL ?>article/s/<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getContent() ?></a></p>
                        </div>
                        <div class="card-body text-center">

                            <a href="<?= URL?>article/e/<?= $articles[$i]->getId() ?>" class="btn btn-primary text-center m-1" target="_blank">Modifier</a>
                            <a href="<?= URL?>article/d/<?= $articles[$i]->getId() ?>" class="btn btn-success text-center m-1" target="_blank">Supprimer</a>
                            <a href="<?= URL?>article/a/<?= $articles[$i]->getId() ?>" class="btn btn-warning text-center m-1" target="_blank">Ajouter</a>
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


