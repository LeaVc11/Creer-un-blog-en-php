<?php

require_once "Models/Class/Article.php";


ob_start(); ?>

<!--section projet-->
<h1>Bonjour , </h1>
<section class="border-bottom mb-5">
    <div class="container mb-5 pb-5">
        <h2 class="text-center mt-mb-5 mt-4 display-4">Algarve</h2>
        <p class="card-text">Les côtes ensoleillées de l'Algarve sont le lieu idéal pour des escapades en tout genre,
            que ce soit pour ceux qui recherchent la vie nocturne animée de Lagos la clinquante ou ceux qui rêvent d'un
            séjour paisible et intime à Sagres. La région la plus méridionale du Portugal offre des attractions
            historiques dans l'ancienne capitale maure Silves et la fascinante Tavira, d'excellents parcours de golf, de
            merveilleuses plages de Praia da Luz à Armacao de Pera, des sources thermales à Caldas de Monchique et des
            kilomètres de grottes, falaises et baies calcaires le long de ses côtes sauvages.
        </p>
        <p class="fs-5 text-dark mb-md-5 mb-3 text-center">Le Portugal </p>

        <!--  carousel-->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Public/images/Ponta-da-Piedade-Lagos.jpg" class="d-block w-100" alt="plage Portugal">
                    <h5 class="card-title text-center mt-4 mb-4">Ponte da Piedade, Lagos </h5>
                    <p class="card-text pb-4">Ponta da Piedade se définie par ses falaises creusées dans la roche qui
                        abritent des tunnels naturels et des cavernes secrètes. Ces falaises de couleur doré contrastent
                        avec le vert et le turquoise de la mer, c’est absolument sublime. Pour visiter ces cavernes, il
                        faut prendre un petit bâteau qui se trouve au bas des 182 marches.
                        Il est aussi possible de faire une excursion de kayak ou en paddle board partant de la plage
                        Batata.. </p>
                </div>
                <div class="carousel-item">
                    <img src="Public/images/istockphoto-658446924-612x612.jpg" class="d-block w-100" alt="...">
                    <h5 class="card-title text-center mt-4 mb-4">Praia do Gigi, Quinta do lago</h5>
                    <p class="card-text pb-4 ">Joli paysage au Portugal.
                        Si vous aimez la tranquillité, cette plage est pour vous. Vous devez traverser à pied un pont
                        qui traverse la rivière protégée du parc naturelle Ria Formosa.

                </div>
                <div class="carousel-item">
                    <img src="Public/images/portugal-Algarve.jpg" class="d-block w-100" alt="...">
                    <h5 class="card-title text-center mt-4 mb-4">Praia do Gigi, Quinta do lago</h5>
                    <p class="card-text pb-4 ">Joli paysage au Portugal.
                        Si vous aimez la tranquillité, cette plage est pour vous. Vous devez traverser à pied un pont
                        qui traverse la rivière protégée du parc naturelle Ria Formosa,
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--     card-->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
            <?php


            for ($i = 0; $i < count($articles); $i++) {
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">

                            <img src="public/images/<?= $articles[$i]->getImageLink() ?>" class="w-100 p-3" alt="Plage">
                            <p class="card-text text-center fw-bold"><a  class="text-decoration-none" href="<?= URL ?>article/s/<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getContent() ?></a></p>

                        </div>

                        <div class="card-body text-center">

                            <a href="<?= URL?>article/e/<?= $articles[$i]->getId() ?>" class="btn btn-primary text-center m-1" target="_blank">Modifier</a>
                            <a href="<?= URL?>article/d/<?= $articles[$i]->getId() ?>" class="btn btn-success text-center m-1" target="_blank">Supprimer</a>
                            <a href="<?= URL?>article/a/<?= $articles[$i]->getId() ?>" class="btn btn-warning text-center m-1" target="_blank">Editer</a>
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


