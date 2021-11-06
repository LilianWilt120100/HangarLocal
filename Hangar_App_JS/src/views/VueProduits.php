<?php

namespace App\Vues;

class VueProduits {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function render(array $parameters) {
        
        $vue = <<<END
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Hangar Local</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="../web/css/styles.css" rel="stylesheet" />
            <link href="../web/css/card.css" rel="stylesheet" />
            <link href="../web/css/custom.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-lg-5 ">
                    <a class="navbar-brand justi" href="{$parameters['routeContext']->getRouteParser()->urlFor('ProducteurProduit')}">Hangar Local <br>Espace producteur</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('ProducteurProduit')}" id="produits" class="nav-link active">Produits</a></li>
                                <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('ProducteurProfil')}" id="profil" class="nav-link">Profil</a></li>
                                <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('ProducteurCommandes')}" id="commandes" class="nav-link">Commandes</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </nav>





            <!-- Header-->

            <!-- Page Content-->
            <section class="pt-4">
                <div class="container ">
                    <!-- Page Features-->



                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="col">Descritpion</th>
                            <th scope="col">Prix_unitaire</th>
                            <th scope="col">tailleLot</th>
                            <th scope="col">Disponible</th>
                        </tr>
                        </thead>
                        <tbody id="listProduits">

                        </tbody>
                    </table>

                    </div>
                </div>
            </section>

            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Hangar Local 2021</p>
                </div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script type="module" src="../js/scripts.js"></script>
        </body>

        </html>
        END;
        return $vue;
    }
}