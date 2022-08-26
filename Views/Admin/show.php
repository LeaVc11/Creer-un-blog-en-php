<?php

use App\Models\Class\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
<!--        <p class=" fw-bold text-center text-info display-6 m-5"></p>-->
        <div class="col-6 mt-5 text-center">
<!--            --><?php
//dd($article->getImageLink());
//            ?>
            <img src="Public/uploads/<?= $article->getImageLink() ?>" class="w-50 p-3" alt="">
        </div>
        <div class="col-6 mt-5 p-5 text-center fw-bold ">
            <h4><?= $article->getTitle(); ?>
                <div class="container mt-5">
                    <div class="row mt-2">
                        <div class="col-md">
                            Auteur :
                        </div>
                        <div class="col-md text-success">
                            <?= $article->getAuthor() ?>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md">
                            Ecrit le :
                        </div>
                        <div class="col-md">
                            <?= $article->getCreatedAt()->format('d/m/Y ') ?>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md">
                            Modifié le :
                        </div>
                        <div class="col-md">
                            <?= $article->getUpdatedAt()->format('d/m/Y ') ?>
                        </div>
                    </div>


                </div>


        </div>
    </div>
<div class=" text-center">
    <a href="comments" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Voir commentaires</a>
</div>
<div class=" text-center">
    <a href="articles" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Retour</a>
</div>
<?php
require "Views/Articles/addComment.php";
?>

