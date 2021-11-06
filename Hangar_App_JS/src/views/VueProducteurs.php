<?php

namespace App\Vues;

class VueProducteurs {

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
            <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary Nav">
                <div class="container px-lg-5 ">
                    <a class="navbar-brand" href="{$parameters['routeContext']->getRouteParser()->urlFor('Accueil')}">Hangar Local</a><br>
                    <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0 Nav">
                        <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('ClientProduits')}" id="produits" class="nav-link Nav">Produits</a></li>
                        <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('VoirProducteurs')}" id="producteurs" class="nav-link active Nav">Producteurs</a></li>
                        <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('GererPanier')}" id="panier" class="nav-link Nav">
                                <img class="me-2" src="../web/assets/icone/shopping-cart-solid.svg" height=20 width=20 />Panier</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
        
        
            <!-- Header-->
        
            <!-- Page Content-->
            <section class="pt-4">
                <div class="container">
                    <div class="card-group vgr-cards">
                        <!-- ajt cartes ici -->
                        
    
                    </div>
                </div>
            </section>
        
        
            <div id="modalShow" class="modal fade d-block bg-opaque d-none">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalShowTitle">vue produit a faire TODO</h5>
                            <button type="button" class="btn close">
                                &times;
                            </button>
                        </div>
        
                        <p class="modal-title" id="modalShowDesc">description</p>
                        <div class="modal-footer">
                            <button type="button" id='confirmDel' class="btn btn-secondary yes" data-dismiss="modal">Oui</button>
                            <button type="button" class="btn close btn-primary btn-danger">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <!-- Footer-->
            <footer class="py-5 bg-primary">
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