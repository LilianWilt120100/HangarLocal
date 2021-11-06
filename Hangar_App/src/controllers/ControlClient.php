<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Vues\VueClient;

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

}