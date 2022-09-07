<?php

use App\Routing\Router;

?>
<!--Bienvenue-->
<h1 class="text-center fw-bold my-2">Bienvenue sur le blog de
    <br>
    <span class="text-decoration-underline mt-2"> <?= $user->getUsername() ?></span></h1>

<h2 class=" text-center text-danger text-decoration-underline fw-bold m-2"> Articles</h2>
<p class=" text-center fw-bold lead">Administrez ici les articles du blog.</p>
<div class="container">
    <table class="table text-center">
        <tr class="table-dark">
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Image</th>
            <th scope="col">Chapô</th>
            <th scope="col">Slug</th>
            <th scope="col">Content</th>
            <th scope="col">Date de création</th>
            <th scope="col">Date de modification</th>
            <th scope="col">Auteur</th>
            <?php

            if (isset($_SESSION['user'])) {
                echo('<th>Edition</th>');
            }
            ?>
        </tr>
        <div class="d-flex justify-content-end">
            <a href="<?= Router::generate('/admin/addArticles') ?>"
               class="btn btn-warning  m-1">Ajouter</a>
        </div>
        <tr>
            <?php
            foreach ($articles as $article) {
            ?>
        <tr>
            <td><?= $article->getTitle() ?></td>
            <td><?= $article->getImageLink() ?></td>
            <td><?= $article->getSlug() ?></td>
            <td><?= $article->getChapo() ?></td>
            <td><?= $article->getContent() ?></td>
            <td><?= $article->getCreatedAt()->format('d/m/Y ') ?></td>
            <td><?= $article->getUpdatedAt()->format('d/m/Y ') ?></td>
            <td><?= $article->getAuthor() ?></td>
            <td>
                <a href="<?= Router::generate('/admin/editArticle/' . $article->getId()) ?>" class="btn btn-secondary"
                   role="button">Modifier</a>
            </td>
            <td>
                <a href="<?= Router::generate('/admin/deleteArticle/' . $article->getId()) ?>" class="btn btn-danger"
                   role="button">Supprimer</a>
            </td>
            <?php } ?>
        </tr>
    </table>
</div>

<h2 class="text-center text-danger fw-bold text-decoration-underline m-5 ">Commentaires</h2>
<p class="text-center fw-bold lead"> Les status des commentaires.</p>
<div class="container">
    <table class="table text-center">
        <tr class="table-dark">
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Status</th>
            <th scope="col">Content</th>
            <th scope="col">Date de création</th>

            <?php

            if (isset($_SESSION['user'])) {
                echo('<th>Edition</th>');
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($listComments as $listComment) {
            ?>
        <tr>
            <td><?= $listComment->getTitle() ?></td>
            <td><?= $listComment->getStatus() ?></td>
            <td><?= $listComment->getContent() ?></td>
            <td><?= $listComment->getCreatedAt()->format('d/m/Y') ?>
            </td>
<!--            <td>-->
<!--                <a href="--><?//= Router::generate('/comments/addComment/') ?><!--" class="btn btn-primary"-->
<!--                   role="button">Valider</a>-->
<!---->
<!--            </td>-->
            <td>
                <a href="<?= Router::generate('/admin/deleteComment/'.$listComment->getId()) ?>" class="btn btn-danger"
                   role="button">Supprimer</a>
            </td>
            <?php } ?>
        </tr>
    </table>
</div>

