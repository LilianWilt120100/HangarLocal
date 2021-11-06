<?php

namespace App\Vues;

class VuePanier {

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
                       <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('VoirProducteurs')}" id="producteurs" class="nav-link  Nav">Producteurs</a></li>
                       <li class="nav-item"><a href="{$parameters['routeContext']->getRouteParser()->urlFor('GererPanier')}" id="panier" class="nav-link active Nav">
                               <img class="me-2" src="../assets/icone/shopping-cart-solid.svg" height=20 width=20 />Panier</a>
                       </li>
                   </ul>
               </div>
           </nav>
   
   
   
           <!-- Header-->
   
           <!-- Page Content-->
           <section class="pt-4 text-end">
               <div class="container">
   
                   <table class="table">
                       <thead>
                       <tr>
                           <th scope="col" class="w-25 text-center">Produit</th>
                           <th scope="col" class="w-25 text-center">Quantité</th>
                           <th scope="col" class="w-25 text-center">Prix</th>
                       </tr>
                       </thead>
                       <tbody id="listProduits">
   
                       </tbody>
                   </table>
               </div>
               <button id='validCmd' class="btn btn-outline-primary m-3">Valider commande</button>
           </section>
   
           <div id="modalShow" class="modal fade d-block bg-opaque d-none">
               <div id="modalShowSec" class="modal-dialog modal-m modal-dialog-centered">
                   <div id="modalShowContent" class="modal-content text-center">
                       <form action="" class="m-3 d-grid">
                           <div class="row p-2">
                               <label class="col mx-1" for="client_lastname">nom : </label>
                               <input class="col mx-1" type="text" name="client_lastname" id="client_lastname">
                           </div>
                           <div class="row p-2">
                               <label class="col mx-1" for="client_firstname">prénom : </label>
                               <input class="col mx-1" type="text" name="client_firstname" id="client_firstname">
                           </div>
                           <div class="row p-2">
                               <label class="col mx-1" for="client_mail">adresse mail : </label>
                               <input class="col mx-1" type="email" name="client_mail" id="client_mail">
                           </div>
                           <div class="row p-2">
                               <label class="col mx-1" for="client_tel">numéro de téléphone : </label>
                               <input class="col mx-1" type="tel" name="client_tel" id="client_tel">
                           </div>
                           <div class="row p-2">
                               <label class="col mx-1" for="client_retrait">lieu de retrait : </label>
                               <input list="lieu" class="col mx-1" type="tel" name="client_retrait" id="client_retrait">
                               <datalist id="lieu">
                                   <option value="Nancy">
                                   <option value="Metz">
                                   <option value="Epinal">
                                   <option value="Verdun">
                                   <option value="Strasbourg">
                                 </datalist>
                           </div>
                           <div class="row p-2">
                               <button type="button" class="btn btn-outline-danger close col mx-1">annuler</button>
                               <button id="popup_submit" type="submit" class="btn btn-outline-primary col mx-1">valider</button>
                           </div>          
                       </form>
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
           <script type="module" src="../web/js/panier.js"></script>
       </body>
   
       </html>
       END;
       return $vue;
    }
}