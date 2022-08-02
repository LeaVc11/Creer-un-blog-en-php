<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Public/css/style.css">

</head>
<body>

<?php
//    var_dump($errors);
if(!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach($errors as $error):?>
            <p><?=$error;?></p>
        <?php endforeach;?>
    </div>
<?php endif;?>

<section class="d-flex justify-content-center align-content-center w-100 h-100 col-md">
    <div class="m-5 rounded-3 opacity-25 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">S'identifier</h1>

            <form class="form-bloc text-center " method="post" action="login.php">
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control"
                           name="email"
                           placeholder="Votre email"
                           value="<?= $email ?? ''; ?>"

                </div>
                <div class="form-groupe">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="password"
                           name="password"
                           placeholder="Votre password"/>
                </div>
                <div class="form-groupe  ">
                    <button class="btn btn-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                            type="submit">Se connecter
                    </button>
                </div>
            </form>
<!--            <p class=" text-center text-warning m-3 px-3">Première visite sur mon blog ? <a-->
<!--                        href="--><?//= URL ?><!--security/register" class=" text-decoration-none">Inscrivez-vous</a></p>-->
        </div>
    </div>


</section>

</body>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>
