<body>

<h1>Editer un article</h1>

<form method="POST" action="<?= URL ?>admin/e" enctype="multipart/form-data">
    <div class="row m-5">
        <div class="col text-primary fw-bold ">
            <label for="title">Titre : </label>
            <input type="text" value="<?php echo($article->getTitle());?>" class="form-control" id="title" name="title">
        </div>
        <div class="col text-primary fw-bold ">
            <label for="chapo">Chapô : </label>
            <input type="text" value="<?php echo($article->getChapo());?>" class="form-control" id="chapo" name="chapo">
        </div>
    </div>
    <div class="row m-5">
        <div class="col text-primary fw-bold">
            <label for="slug">Slug : </label>
            <input type="text" value="<?php echo($article->getSlug());?>" class="form-control" id="slug" name="slug">
        </div>
        <div class="col text-primary fw-bold ">
            <label for="author">Auteur: </label>
            <input type="text" value="<?php echo($article->getAuthor());?>" class="form-control" id="author" name="author">
        </div>
    </div>
    <div class="row m-5">
        <div class="col text-primary fw-bold">
            <label for="content">Content: </label>
            <textarea name="content"  value="<?php echo($article->getContent());?>>"class="form-control" id="content" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row m-5">
        <div class="col  text-primary fw-bold ">
            <label for="created_at">Date de création: </label>
            <input type="date" value="<?php echo($article->getCreatedAt());?>" class="form-control" id="created_at" name="created_at">
        </div>
        <div class="col text-primary fw-bold ">
            <label for="updated_at">Date de modification: </label>
            <input type="date" value="<?php echo($article->getUpdatedAt());?>" class="form-control" id="updated_at" name="updated_at">
        </div>
    </div>
    <button class="btn btn-primary text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
            type="submit">Valider
    </button>

</form>

    <?php
    if(!is_null($article->getImageLink())){
        echo('<img src="Public/uploads/'.$article->getImageLink().'">');
    }
    ?>
    <input type="submit">

    <?php
    require 'Views/parts/form_errors.php';
    ?>
</form>
</body>
</html>