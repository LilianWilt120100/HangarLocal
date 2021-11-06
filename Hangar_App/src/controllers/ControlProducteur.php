<?php

namespace App\Controls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Producteur;
use App\Vues\VueCommandes;
use App\Vues\VueConnexion;
use App\Vues\VueProduits;
use App\Vues\VueProfil;

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

        if (!empty($request->getParsedBody()['login'])) {
            $mail = $request->getParsedBody()['login'];
            $mdp = $request->getParsedBody()['password'];
            $mail = filter_var($mail, FILTER_SANITIZE_STRING);

            $res = Producteur::query()->where('mail','=',$mail)->get();
            
        }
    }

    public function afficherProduits(Request $request, Response $responce, Array $parameters) {
        $vue = new VueProduits($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }
    
    public function afficherProfil(Request $request, Response $responce, Array $parameters) {
        $vue = new VueProfil($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }

    public function afficherCommandes(Request $request, Response $responce, Array $parameters) {
        $vue = new VueCommandes($this->container);
        $responce->getBody()->write($vue->render($parameters));
        return $responce;
    }
}