<?php

namespace App\Vues;

class VueAccueil {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function render(array $parameters) {
        $vue =
            <<<END
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Hangar Local</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="../web/assets/favicon.ico" />
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
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container px-lg-5 ">
                    <a class="navbar-brand justi" href="#!">Hangar Local</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a id="produits" class="nav-link">Produits</a></li>
                            <li class="nav-item"><a id="producteurs" class="nav-link">Producteurs</a></li>
                            <li class="nav-item"><a id="panier" class="nav-link">
                                    <img class="me-2" src="../web/assets/icone/shopping-cart-solid.svg" height=20 width=20 />Panier</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <!-- Header-->
        
            <!-- Page Content-->
            <section class="pt-4">
                <div class="container text-center p-2">
                    <!-- Page Features-->
        
                        <p class="title fs-1 fw-bold">Hangar Local</p>
                        <br><br><br>
                        <a class="btn btn-primary w-25" href="">Espace producteur</a>
                        <a class="btn btn-primary w-25" href="html/produits.html">Espace client</a>
        
                        <br><br><br><br><br><br>
                </div>
        
            </section>
        
            <!-- Footer-->
            <footer class="py-5 bg-primary">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Hangar Local 2021</p>
                </div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script type="module" src="../web/js/scripts.js"></script>
        </body>
        
        </html>
        END;
        return $vue;
    }
}
