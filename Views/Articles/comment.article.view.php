<section class="mb-5 p-5 shadow rounded">
    <div class="row">
        <div class="col">
            <h2 class="fw-bold pb-2">Commentaires</h2>

            <div class="card mb-4 rounded">
                <div class="row g-0">
                    <div class="col-md-2 text-center pt-3 bg-light">
                        <p class="fw-bold">
                            <i class="fas fa-user"></i>
                        </p>
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <small class="text-muted">le </small>
                            <div class="card-text"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center my-5">
                    <p class="text-muted">Aucun commentaire pour le moment.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col my-4">

            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
            {% endif %}
            <form method="post" action="Views/Articles/add.article.view.php">

                <legend>Laisser un commentaire sur cet article</legend>
                <small class="text-muted">Vous devez <a href="security/login">être connecté(e)</a> à votre compte utilisateur pour pouvoir laisser un commentaire.</small>
                <div class="my-3">
                    <label for="commentTitle" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="commentTitle"  name="commentTitle" required>
                </div>
                <div class="mb-3">
                    <label for="commentContent" class="form-label">Votre commentaire</label>
                    <textarea name="commentContent" class="form-control" id="commentContent" rows="4" maxlength="250"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</section>