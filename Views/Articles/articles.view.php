<?php

require_once "Models/Class/Article.php";


ob_start(); ?>

<!--section projet-->

<section class="border-bottom mb-5">
    <div class="container m-5 pb-2">
        <p class="card-text text-center text-primary fw-bold">Mes projets réalisés lors de ma formation de Développeur
            d'application
        </p>
        <p class="card-text text-center text-primary fw-bold">PHP/Symfony et mes créations personnelles.
        </p>

        <!--     card-->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">


            <?php
//            dd($article);
            foreach ($articles as $article) {
            //var_dump($articles);
            //die();
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">

<!--//var_dump($articles);-->
<!--//die();-->

                            <img src="Public/uploads/<?= $article->getImageLink() ?>" class="w-50 mb-5 p-3"
                                 alt="image">

                            <p class="card-text text-center fw-bold">
                                <a href="<?= URL ?>article/s/<?= $article->getId(); ?>" class="btn btn-primary">Voir</a>
                            </p>

                        </div>

                    </div>


                </div>
            <?php } ?>

</section>


<?php
$content = ob_get_clean();
require "Views/template.php";
?>


