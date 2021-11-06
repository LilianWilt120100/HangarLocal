<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Vues\VueClient;
use App\Vues\VuePanier;
use App\Vues\VueProducteurs;

class ControlClient {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function afficherProduits(Request $request, Response $responce, Array $parameters) {
        $vue = new VueClient($this->container);
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