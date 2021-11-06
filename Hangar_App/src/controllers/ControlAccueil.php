<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use DI\Container;
use App\Vues\VueAccueil;

class ControlAccueil {

    private $container = null;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function afficherIndex(Request $request, Response $responce, Array $parameters): Response {
        $vue = new VueAccueil($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function afficherApropos(Request $request, Response $responce, Array $parameters) {
        
    }
}