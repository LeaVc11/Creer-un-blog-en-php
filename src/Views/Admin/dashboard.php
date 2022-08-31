
<h2 class="text-secondary m-5 ">Articles</h2>
<p class="lead">Administrez ici les articles du blog.</p>


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

        use App\Routing\Router;

        if (isset($_SESSION['user'])) {
            echo('<th>Edition</th>');
        }
        ?>
    </tr>
    <div class="d-flex justify-content-end">
        <a href="admin/add" class="btn btn-warning  m-1">Ajouter</a>
    </div>
    <tr>
        <?php
        foreach ($articles as $article) {
        ?>
    <tr>
        <td><?= $article->getImageLink() ?></td>
        <td><?= $article->getChapo() ?></td>
        <td><?= $article->getTitle() ?></td>
        <td><?= $article->getContent() ?></td>
        <td><?= $article->getSlug() ?></td>
        <td><?= $article->getAuthor() ?></td>
        <td><?= $article->getCreatedAt()->format('d/m/Y ') ?></td>
        <td><?= $article->getUpdatedAt()->format('d/m/Y ') ?></td>

    <td>

        <a href="<?= Router::generate('/admin/editArticle/'.$_POST['articleId'])?>" class="btn btn-secondary"
           role="button">Modifier</a>
    </td>
    <td>

        <a href="<?= Router::generate('/admin/deleteArticle/'.$_POST['articleId']) ?>" class="btn btn-danger"
           role="button">Supprimer</a>
    </td>

    <?php } ?>
    </tr>
</table>

<h2 class="text-secondary m-5 ">Commentaires</h2>
<p class="lead">Administrez ici les commentaires de l'articles.</p>


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
    <tr>
        <?php
//        var_dump($comments as $comment);
//        die();
        foreach ($comments as $comment) {
        ?>
    <tr>
        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getStatus() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedBy() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y') ?>
        </td>

        <td>
            <a href="<?= Router::generate('/comments/addComment/'.$_POST['articleId']) ?>" class="btn btn-secondary"
               role="button">Valider</a>
        </td>
        <td>
            <a href="<?= Router::generate('/comments/'.$_POST['articleId']) ?>" class="btn btn-secondary"
               role="button">Supprimer</a>
        </td>

        <?php } ?>
    </tr>
</table>


