<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Vues\VueClient;
use App\Vues\VuePanier;
use App\Vues\VueProducteurs;
use App\Models\Produit;
use App\Models\Producteur;

class ControlClient {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function afficherProduits(Request $request, Response $responce, Array $parameters) {
        $vue = new VueClient($this->container);

        $categorie = "Legumes"; 
        $listproduit = Produit::query()->where('categorie', '=', $categorie)->get();

        $liste_producteur = [];
        foreach($listproduit as $prod){
            array_push($liste_prod, Producteur::query()->where('id', '=', $prod->id_producteur)->get());
        }
        

        $parameters['listeProd'] = $listproduit;
        $parameters['listeProd'] = $listproducteur;

        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function commander(Request $request, Response $responce, Array $parameters) {

    }

    public function voirProducteurs(Request $request, Response $responce, Array $parameters) {
        $vue = new VueProducteurs($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function gererPanier(Request $request, Response $responce, Array $parameters) {
        $vue = new VuePanier($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }
}