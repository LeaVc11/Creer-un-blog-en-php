
<h2 class="text-secondary m-5 "> Mes commentaires</h2>

<table class="table table-light text-center ">
    <tr class="table-secondary">
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date de création</th>>
        <th scope="col">Auteur</th>
    </tr>
        <?php

        use App\Routing\Router;

        foreach ($comments as $comment) {
        ?>
    <tr>
        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y') ?></td>
        <td><?= $comment->getCreatedBy() ?></td>

    </tr>
        <?php } ?>
</table>
<div class=" text-center">
    <a href="<?= Router::generate('/articles/') ?>" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Retour</a>
</div>
<div class=" m-4 fw-bold ">

    <h1 class="m-3 text-center text-primary">Modifier un commentaire</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row m-5">
            <div class="col text-primary fw-bold ">
                <label for="title">Titre : </label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold ">
                <label for="author">Auteur: </label>
                <input type="text" class="form-control" id="author" name="author">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class=" text-center">
            <a href="admin/dashboard" class="btn btn-primary text-white text-center mb-2 w-100 rounded-1 border form-control" target="_blank">Retour</a>
            <button class="btn btn-primary text-white text-center w-100 rounded-1 border form-control"
                    type="submit">Valider
            </button>
        </div>
    </form>




