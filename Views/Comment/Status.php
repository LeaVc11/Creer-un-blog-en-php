<?php
ob_start();
?>
<?php
//    var_dump($errors);
if (!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?= $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    <main class="mb-5 pb-5">
    <h2 class="text-secondary">Liste des commentaires</h2>
    <p class="lead">Gérez ici les commentaires. Pour chaque commentaire, vous pouvez le valider pour publication ou le
        rejeter.</p>
    <table class="table table-hover">
    <caption>Commentaires en attente de validation</caption>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Envoyé à</th>
        <th scope="col">Auteur</th>
        <th scope="col">Article</th>
        <th scope="col">Statut</th>
        <?php
        if (isset($_SESSION['user'])) {
            echo('<th>Edition</th>');
        }
        ?>
    </tr>
    </thead>
    <tbody>
<?php


/** @var TYPE_NAME $comments */
foreach ($comments as $comment) {
    ?>
    <tr>
        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedBy() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y') ?></td>
        <td>

            <?php
            //dd($article->getId());
            ?>

        </td>
        <td>
            <form action="" method="post">

                <button class="btn btn-success" type="submit">Valider</button>
            </form>
        </td>
        <td>
            <form action="" method="post">

                <button class="btn btn-danger" type="submit">Rejeter</button>
            </form>
        </td>
        <?php } ?>
    </tr>

    <tr>
        <td colspan="8">Aucun commentaire en attente.</td>
    </tr>

    </tbody>
    </table>
    <table class="table table-hover">
        <caption>Commentaires rejetés</caption>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Envoyé à</th>
            <th scope="col">Auteur</th>
            <th scope="col">Article</th>
            <th scope="col">Statut</th>
        </tr>
        </thead>
        <tbody>
    <?php

    foreach ($comments as $comment) {
        ?>
    <tr>
        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedBy() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y ') ?></td>
        <td>

                <?php
                //dd($article->getId());
                ?>

            </td>
        </tr>
    <?php } ?>
        <tr>
            <td colspan="7">Aucun commentaire rejeté.</td>
        </tr>

        </tbody>
    </table>
    <table class="table table-hover mb-5">
        <caption>Commentaires acceptés</caption>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Envoyé à</th>
            <th scope="col">Auteur</th>
            <th scope="col">Article</th>
            <th scope="col">Statut</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($comments as $comment) {
            ?>
        <tr>
            <td><?= $comment->getTitle() ?></td>
            <td><?= $comment->getContent() ?></td>
            <td><?= $comment->getCreatedBy() ?></td>
            <td><?= $comment->getCreatedAt()->format('d/m/Y ') ?></td>
            <td>

                    <?php
                    //dd($article->getId());
                    ?>

                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="7">Aucun commentaire publié.</td>
        </tr>

        </tbody>
    </table>
    </main>
