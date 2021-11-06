<?php

session_start();

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Security\Cors;
use App\Models\Producteur;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Categorie;
use App\Controls\ControlAccueil;
use App\Controls\ControlProducteur;
use App\Controls\ControlClient;


require __DIR__ . '/../vendor/autoload.php';


$db = new Capsule();
$db->addConnection(parse_ini_file('../config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

//Décommanter cette ligne quand on push sur webetu (oui je sais c'est moche)
//$enProd="/www/franco377u/hangarLocal/Hangar_App/public/";

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->add(new Cors());

$app->get('[/]', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlAccueil($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherIndex($request, $responce, $parameters);
})->setName('Accueil');


$app->get('/producteur', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlProducteur($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherConnexion($request, $responce, $parameters);
})->setName('AfficherConnexion');


$app->post('/producteur', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlProducteur($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->connexion($request, $responce, $parameters);
})->setName('Connexion');


$app->get('/client/produits', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlClient($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherProduits($request, $responce, $parameters);
})->setName('ClientProduits');


$app->post('/client/produits', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlClient($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->commander($request, $responce, $parameters);
})->setName('Commander');


$app->get('/client/producteurs', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlClient($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->voirProducteurs($request, $responce, $parameters);
})->setName('VoirProducteurs');


$app->get('/client/panier', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlClient($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->gererPanier($request, $responce, $parameters);
})->setName('GererPanier');


$app->get('/producteur/{id}/produits', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlProducteur($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherProduits($request, $responce, $parameters);
})->setName('ProducteurProduit');


$app->get('/producteur/{id}/commandes', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlProducteur($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherCommandes($request, $responce, $parameters);
})->setName('ProducteurCommandes');


$app->get('/producteur/{id}/profil', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlProducteur($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherProfil($request, $responce, $parameters);
})->setName('ProducteurProfil');


$app->get('/apropos', function (Request $request, Response $responce, array $parameters) {
    $control = new ControlAccueil($this);
    $routeContext = RouteContext::fromRequest($request);
    $parameters['routeContext'] = $routeContext;
    return $control->afficherApropos($request, $responce, $parameters);
})->setName('A propos');


$app->run();
