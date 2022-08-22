<html>
<head>

</head>
<body>

<h1>Editer une article</h1>

<form method="post" enctype="multipart/form-data">
    <label>Titre</label>
    <input type="text" value="<?php echo($article->getTitle());?>" placeholder="Nom de l'article" name="nom">

    <?php
    if(!is_null($article->getImage())){
        echo('<img src="Public/uploads/'.$article->getImageLink().'">');
    }
    ?>
    <input type="submit">

</form>
</body>
</html>