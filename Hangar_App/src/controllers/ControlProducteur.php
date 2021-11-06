<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Vues\VueProducteur;
use App\Models\Producteur;

class ControlProducteur {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function afficherConnexion(Request $request, Response $responce, Array $parameters) {
        $vue = new VueProducteur($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function connexion (Request $request, Response $responce, Array $parameters) {

    }
}