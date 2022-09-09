<?php

use App\Routing\Router;

?>
<div class="container">
    <section class="border-bottom mb-5 text-center">
        <div class="container m-5 pb-2">
            <p class="card-text text-center text-primary fw-bold">Mes projets réalisés lors de ma formation de
                Développeur
                d'application
            </p>
            <p class="card-text text-center text-primary fw-bold">PHP/Symfony et mes créations personnelles.
            </p>

            <!--     card-->

                <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
                    <?php
                    foreach ($articles as $article) {
                        ?>
                        <div class="col">
                            <div class="card h-150">
                                <div class="card-body text-center mt-2">
                                    <img src="<?= Router::generate('/Public/') ?>uploads/<?= $article->getImageLink() ?>"
                                         class="w-50 mb-2"
                                         alt="image">
                                    <p class="card-text text-center fw-bold mt -2">
                                    <h5 class="mb-3"><?= $article->getTitle() ?></h5>
                                    <p><?= $article->getSlug() ?></p>
                                    <a href="<?= Router::generate('/articles/' . $article->getId()) ?>"
                                       class="btn btn-primary">Voir</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

    </section>
</div>

