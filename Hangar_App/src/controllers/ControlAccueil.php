<?php

namespace App\Controls;

use App\Vues\VueAccueil;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlAccueil {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function afficherIndex(Request $request, Response $responce, Array $parameters) {
        $vue = new VueAccueil($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }
}