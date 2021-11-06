<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Producteur;
use App\Vues\VueConnexion;

class ControlProducteur {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function afficherConnexion(Request $request, Response $responce, Array $parameters) {
        $vue = new VueConnexion($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function connexion(Request $request, Response $responce, Array $parameters) {

    }

    public function afficherProduits(Request $request, Response $responce, Array $parameters) {

    }
    
    public function afficherProfil(Request $request, Response $responce, Array $parameters) {

    }

    public function afficherCommandes(Request $request, Response $responce, Array $parameters) {
        
    }
}