<?php

use App\Routing\Router;

?>

    <div class="row">
        <div class="col-6 mt-5 text-center">

            <img src="../Public/uploads/<?= $article->getImageLink() ?>" class="w-50 p-3" alt="">
            <h3 class=" text-success fw-bold mb-4"><?= $article->getTitle(); ?></h3>
            <p class="fw-bold"><?= $article->getSlug(); ?></p>
            <p class="fw-bold"><?= $article->getContent(); ?>></p>
        </div>
        <div class="col-6 mt-5 p-5 text-center fw-bold ">
            <table class="table">
                <thead>
                <tr class="table-secondary">
                    <th scope="col">Auteur</th>
                    <th scope="col" >Date de publication</th>
                    <th scope="col">Date de modification</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $article->getAuthor() ?></td>
                    <td> <?= $article->getCreatedAt()->format('d/m/Y ') ?></td>
                    <td> <?= $article->getUpdatedAt()->format('d/m/Y ') ?></td>
                </tr>
                </tbody>
            </table>
            <a href="<?= Router::generate('/comments/'.$article->getId()) ?>"
               class="btn btn-secondary text-center text-white fw-bold mb-2 mx-2"
            >Voir commentaires</a>
            <a href="<?= Router::generate('/articles') ?>"
               class="btn btn-primary text-center text-white fw-bold mb-2">Retour</a>
            <a href=" https://monportfolio.carine-dev.fr/ "
               class="btn btn-warning text-center text-white fw-bold mb-2">Site</a>


        </div>
    </div>

<?php

require __DIR__ . '/../Articles/addComment.php';

?>