<?php

use App\Routing\Router;

?>
<div class="  d-flex flex-column  mt-5">
    <div class="row ">
        <div class="col ">
            <div class=" mb-5 px-1 py-4">
                <div class="row">
                    <div class="col-md-5">
                        <div class="portrait text-center">
                            <img src="<?= Router::generate('/public/')?>images/photo/Maphoto.jpg" class="rounded-circle" alt="photo img">

                        </div>
                        <p class="text-animation text-center "></p>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body">
                            <h5 class="card-title text-center text-warning mb-4 fs-2"> De Vendeur Gestionaire à
                                développeur </h5>
                            <p class="card-text text-justify fs-5">Actuellement en reconversion professionnelle,
                                j'ai commencé ma carrière comme
                                <span class="text-warning fw-bold">Vendeur gestionnaire</span> à Métro Cash & Carry
                                à Saint-Étienne pendant 15 ans
                                jusqu'en 2020. </p>

                            <p class="card-text text-justify fs-5"> Attiré depuis toujours par l'informatique et le
                                développement, j'ai entamé en novembre 2020 ma
                                reconversion profesionnelle. </p>
                            <p class="card-text text-justify fs-5"> J'ai été en formation à templs complet jusqu'en
                                novembre 2021 pour obtenir le <span class="text-warning fw-bold">titre RNCP de Développeur Web et Web Mobile </span>
                                à Saint-Just Saint-Rambert.</p>
                            <p class="card-text text-justify fs-5"> Mars 2022, nouvelle aventure pour obtenir
                                Diplôme niveau 6 (Bac +3/4) <span class="text-warning fw-bold">Développeur d'application PHP / Symfony </span>
                                100 % en ligne avec Openclassroom. </p>

                            <a class="btn btn-success btn-lg rounded mt-5 ms-4" role="button" type="submit"
                               href="https://monportfolio.carine-dev.fr/ ">Mon Site </a>
                            <a class="btn btn-primary btn-lg rounded mt-5" role="button" type="submit"
                               href="<?= Router::generate('/public/')?>images/Carine%20Vinagre.pdf" >Mon CV</a>
                            <a class="btn btn-info btn-lg rounded mt-5" role="button" type="submit"
                               href="https://github.com/vcarine" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-github me-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                                Mon GitHub </a>
                            <a class="btn btn-warning btn-lg rounded mt-5" role="button" type="submit"
                               href="https://www.linkedin.com/in/carine-vinagre-2992ab24/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-linkedin me-2" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                                Linkedin </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div
</div>
