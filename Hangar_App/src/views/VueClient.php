<?php

namespace App\Vues;

class VueClient {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function affListeProd($parameters){
        $listeProd = "";

        foreach($parameters['lisetProd'] as $prod){
            $listeProd += <<<END
            <div class="card-body">
                    <h4 class="card-title" id="infot{$prod->nom}">{$parameters->nom}
                    <img class="me-2" src="../assets/icone/info-circle-solid.svg" height=20 width=20 /></h4>
                    <div class="card-text description">
                        <p>Vendu par : <a href="../html/producteurs.html" class="producteur">{$parameters['producteur']}</a></p>
                        <p>Prix : {$prod->tarif_unitaire}€</p>
                    </div>
                    <input type="number" name="quantite" class="quantite" min="0" value="1">
                    <a class="btn btn-outline-primary">ajouter au panier</a>
                </div>
            END;
        }

        return $listeProd;
    }

    public function render(array $parameters) {
        $listeProd = affListeProd($parameters);

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
            <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary Nav NavPrim">
                <button class="navbar-toggler left" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="container containerPrim px-lg-5 ">
                    <a class="navbar-brand" href="{$parameters['routeContext']->getRouteParser()->urlFor('Accueil')}">Hangar Local</a>
                    <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0 Nav">
                        <li class="nav-item"><a id="{$parameters['routeContext']->getRouteParser()->urlFor('ClientProduits')}" class="nav-link active Nav">Produits</a></li>
                        <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('VoirProducteurs')}" d="producteurs" class="nav-link Nav">Producteurs</a></li>
                        <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('GererPanier')}" id="panier" class="nav-link Nav">
                                <img class="me-2" src="../web/assets/icone/shopping-cart-solid.svg" height=20 width=20 />Panier</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navbar navbar-dark bg-dark Nav NavSec">
                <div class="container containerSec px-lg-5 ">
                    <div class="" id="navbarSupportedContent">
                        <ul id="caTabs" class="navbar-nav ms-auto mb-2 mb-lg-0 Nav">
                    
                        </ul>
                    </div>
                </div>
            </nav>



            <!-- Header-->

            <!-- Page Content-->
            <section class="pt-4">
                <div class="container">
                    <div class="card-group vgr-cards">
                        <!-- ajt cartes ici -->
END;

                $vue += $listeProd + <<<END
                    </div>
                </div>
            </section>

            <div id="modalShow" class="modal fade d-block bg-opaque d-none">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div id="modalShowImg" class="modal-header infoBox" style="background-image: url(../assets/img/carotte.png);">
                            <h5 class="modal-title" id="modalShowTitle">Carotte bio 1 kg</h5> 
                            <button type="button" class="btn close">
                                &times;
                            </button>
                        </div>
    
                        <p class="" id="modalShowDesc">description</p>
                        <p id="modalShowPrice">Prix : 2.99€</p>
                        <div class="d-flex">
                            <p>producteur : <a id="modalShowProd" href="">Michel</a></p>
                    
                        </div>
                        <div class="d-flex">
                            <input id="modalShowGetQuantity" type="number" name="quantite" class="quantite" min="0" value="1" class="quantite">
                            <button id="modalShowAddCart" class="btn btn-outline-primary">ajouter au panier</button>
                        </div>
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
            <script type="module" src="../web/js/scripts.js"></script>
            <script type="module" src="../web/js/listeProduit.js"></script>

        </body>

        </html>
        END;
        return $vue;
    }
}