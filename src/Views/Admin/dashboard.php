<?php

use App\Routing\Router;

?>
<!--Bienvenue-->
<h1 class="text-center fw-bold my-2">Bienvenue sur le blog de
    <br>
    <span class="text-decoration-underline mt-2"> <?= $user->getUsername() ?></span></h1>

<h2 class=" text-center text-danger text-decoration-underline fw-bold m-2"> Articles</h2>
<p class=" text-center fw-bold lead">Administrez ici les articles du blog.</p>
<div class="container ">
    <div class="row">
        <table class="table  text-center table-hover table table-bordered p-5">
            <thead class="table-primary col-3">
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
                    echo('<th >Edition</th>');
                }
                ?>
                </th>
            </tr>
            </thead>
            <div class="d-flex justify-content-end">
                <a href="<?= Router::generate('/admin/addArticles') ?>"
                   class="btn btn-warning  m-1">Ajouter</a>
            </div>
            <tr>
                <?php
                foreach ($articles

                as $article) {
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
                    <a href="<?= Router::generate('/admin/editArticle/' . $article->getId()) ?>"
                       class="btn btn-primary m-2"
                       role="button">Modifier</a>
                    <a href="<?= Router::generate('/admin/deleteArticle/' . $article->getId()) ?>"
                       class="btn btn-danger"
                       role="button">Supprimer</a>
                </td>
                <?php } ?>
            </tr>

        </table>
    </div>
</div>

<h2 class="text-center text-danger fw-bold text-decoration-underline m-2 ">Commentaires</h2>
<p class="text-center fw-bold lead"> Les status des commentaires.</p>
<div class="container ">
    <table class="table table-light text-center table-hover table-bordered p-5">
        <thead class="table-primary">

        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Status</th>
            <th scope="col">Content</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date de création</th>

            <?php

            if (isset($_SESSION['user'])) {
                echo('<th>Edition</th>');
            }
            ?>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($listComments

            as $listComment) {
            ?>
        <tr>
            <td><?= $listComment->getTitle() ?></td>
            <td><?= $listComment->getStatus() ?></td>
            <td><?= $listComment->getContent() ?></td>
            <td><?= $listComment->getCreatedBy() ?></td>
            <td><?= $listComment->getCreatedAt()->format('d/m/Y') ?>  </td>


            <td>
                <a href="<?= Router::generate('/comments/editComment/' . $listComment->getId()) ?>"
                   class="btn btn-primary"
                   role="button">Modifier</a>
                <a href="<?= Router::generate('/admin/deleteComment/' . $listComment->getId()) ?>"
                   class="btn btn-danger"
                   role="button">Supprimer</a>
            </td>
            <?php } ?>
        </tr>
    </table>
</div>

<h2 class="text-center text-danger fw-bold text-decoration-underline m-3  ">Contact</h2>
<div class="container">
    <table class="table table-light text-center table-bordered table-hover p-5">

        <thead class="table-primary">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Message</th>

            <?php

            if (isset($_SESSION['user'])) {
                echo('<th>Edition</th>');
            }
            ?>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($contacts as $contact) {
            ?>
        <tr>
            <td><?= $contact->getEmail() ?></td>
            <td><?= $contact->getUsername() ?></td>
            <td><?= $contact->getMessage() ?></td>

            <td>
                <a href="<?= Router::generate('/admin/deleteContact/' . $contact->getId()) ?>" class="btn btn-danger"
                   role="button">Supprimer</a>
            </td>

            <?php } ?>
        </tr>
    </table>
</div>

<h2 class="text-center text-danger fw-bold text-decoration-underline m-3  ">Les utilisateurs</h2>
<div class="container">
    <table class="table table-light text-center table-bordered table-hover p-5">

        <thead class="table-primary">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>

            <?php

            if (isset($_SESSION['user'])) {
                echo('<th>Edition</th>');
            }
            ?>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($users

            as $user) {
            ?>
        <tr>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getPassword() ?></td>
            <td><?= $user->getRole() ?></td>

            <td>
                <a href="<?= Router::generate('/admin/deleteUser/' . $user->getId()) ?>" class="btn btn-danger"
                   role="button">Supprimer</a>
            </td>

            <?php } ?>
        </tr>
    </table>
</div>