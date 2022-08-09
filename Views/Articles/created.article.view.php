
<main class="mb-5 pb-5">
    <div class="mb-5">
        <h2 class="text-secondary">Ajouter un article</h2>
        <p>
            Irure dolore officia non minim. Sunt minim sunt ex adipisicing ea ipsum labore fugiat aute. Reprehenderit fugiat elit est Lorem. Reprehenderit nostrud esse aute sunt cillum et ea est ipsum consequat. Aliquip mollit ex aliqua fugiat. Culpa ex proident non sint nostrud. Culpa aliquip cillum duis proident aliquip nulla esse qui Lorem irure occaecat minim.
        </p>
        <div class="container">
            <div class="row">
                <div class="col-10 card bg-light mt-5">
                    <form action="/admin/add-post" method="post" class="card-body">
                        <div class="form-group">
                            <div class="col mt-4">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control mt-2" placeholder="Titre de l'article" name="title">
                            </div>
                            <div class="col mt-4">
                                <label for="leadSentence">Châpo</label>
                                <input type="text" class="form-control mt-2" placeholder="Châpo de l'article" name="leadSentence">
                            </div>
                            <div class="col mt-4">
                                <label for="title">Slug</label>
                                <input type="text" class="form-control mt-2" placeholder="Slug de l'article" name="slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label mt-4">Contenu</label>
                            <textarea class="form-control" id="content" rows="8" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-4">Publier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
